<?php
//include library dompdf
require_once 'lib/dompdf/autoload.inc.php';
require_once 'lib/escopos/autoload.php';

use Dompdf\Dompdf;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;


class cetak extends Route{
    //inisialisasi state
    private $sn = 'cetakData';
    private $su = 'utilityData';

    private $connector;
    private $printer;

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
        $waktu = date('d M Y', strtotime($qPembelian['waktu']));
        //Insert HTML value
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
        $html .= "<div style='margin-top:20px;'>".$waktu."</div>";
        $html .= "<div style='margin-top:20px;'>".$namaResto."</div>";
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('invoice_pembelian.pdf', array("Attachment" => false));
    }

    public function invoicePengeluaranResto($kdPengeluaran)
    {
        $dompdf = new Dompdf();
        //data pengeluaran 
        $pengeluaran = $this -> state($this -> sn) -> getDataPengeluaran($kdPengeluaran);
        $waktu = date('d M Y', strtotime($pengeluaran['waktu']));
        //data header 
        $logo = $this -> state($this -> sn) -> getSetting('logo_resto');
        $namaResto = $this -> state($this -> sn) -> getSetting('nama_resto');
        $alamatResto = $this -> state($this -> sn) -> getSetting('alamat_resto');
         //Insert HTML value
        $html = "<table><tr><td><img src='ladun/".$logo."' style='width:150px'></td>";
        $html .= "<td><span style='font-size:30px;font-family:calibri;'>Invoice Pengeluaran</span><br/> ".$namaResto.", ".$alamatResto."</td></tr></table>";
        $html .= "<hr/>"; 
        $html .= "<table border='1' style='margin-top:15px;border-collapse:collapse;border:0px;font-size:14px;width:50%;'>";
        $html .= "<tr><td>Kode Transaksi</td><td>".strtoupper($kdPengeluaran)."</td></tr>";
        $html .= "<tr><td>Kategori Pengeluaran</td><td>".$pengeluaran['kategori']."</td></tr>";
        $html .= "<tr><td>Nama Pengeluaran</td><td>".$pengeluaran['nama']."</td></tr>";
        $html .= "<tr><td>Deksripsi</td><td>".$pengeluaran['deks']."</td></tr>";
        $html .= "<tr><td>Operator</td><td>".$pengeluaran['operator']."</td></tr>";
        $html .= "<tr><td>Total Pengeluaran</td><td>Rp. ".number_format($pengeluaran['total'])."</td></tr>";
        $html .= "</table>";
        $html .= "<div style='margin-top:20px;'>".$waktu."</div>";
        $html .= "<div style='margin-top:20px;'>".$namaResto."</div>";
        //render HTML
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('invoice_pengeluaran.pdf', array("Attachment" => false));
    }


    public function invoicePemesanan($kdPembelian)
    {
        //cetak ke printer thermal
        $this->connector = new NetworkPrintConnector("127.0.0.1", "3300");
    }

}