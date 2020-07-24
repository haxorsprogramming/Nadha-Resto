<?php
//include library dompdf
require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class cetak extends Route{
    //inisialisasi state
    private $sn = 'cetakData';
    private $su = 'utilityData';

    public function invoicePembelianBb($kdInvoice)
    {
        //prepare data
        $tempPembelian = $this -> state($this -> sn) -> getDataTemp($kdInvoice);
        $capInvoice = strtoupper($kdInvoice);
        //data header 
        $logo = $this -> state($this -> sn) -> getSetting('logo_resto');
        $namaResto = $this -> state($this -> sn) -> getSetting('nama_resto');
        $alamatResto = $this -> state($this -> sn) -> getSetting('alamat_resto');
        //ambil data pembelian bahan baku 
        $qPembelian = $this -> state($this -> sn) -> getPembelianBb($kdInvoice);
        $totalPembelian = number_format($qPembelian['total']);
        $namaMitra = $this -> state($this -> sn) ->  getNamaMitra($qPembelian['mitra']);
        //start PDF rendering
        $dompdf = new Dompdf();
        $html = "<table><tr><td><img src='ladun/".$logo."' style='width:150px'></td>"; 
        $html .= "<td><span style='font-size:30px;font-family:calibri;'>Invoice Pembelian Bahan Baku</span><br/> ".$namaResto.", ".$alamatResto."</td></tr></table>";
        $html .= "<hr/>";
        $html .= "Kode Invoice : ".$capInvoice."<br/>";
        $html .= "Mitra : ".$namaMitra."<br/>";
        $html .= "Waktu : ".$qPembelian['waktu']."<br/>";
        $html .= "Total Pembelian : Rp. ".$totalPembelian."<br/>";
        $html .= "<div style='text-align:center'><strong>Item Pembelian</strong></div>";
        $html .= "<table border='1' style='margin-top:15px;border-collapse:collapse;border:0px;font-size:14px;width:100%;'>";
        $html .= "<tr><th style='text-align:center'>Nama Bahan</th><th style='text-align:center'>Satuan</th><th style='text-align:center'>Qt</th></tr>";

        foreach($tempPembelian as $tp){
            $qBahan = $this -> state($this -> sn) -> getBahanData($tp['kd_item']);
            $html .= "<tr><td style='padding-left:10px;'>".$qBahan['nama']."</td><td style='padding-left:10px;'>".$qBahan['satuan']."</td><td style='padding-left:10px;'>".$tp['qt']."</td></tr>";
        }
        $html .= "</table>";
        $html .= "<div style='margin-top:20px;'>Medan 20 Maret 2020</div>";
        $html .= "<div style='margin-top:20px;'>Nadha Resto</div>";
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('invoice_pembelian.pdf', array("Attachment" => false));
    }

}