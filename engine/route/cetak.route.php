<?php

require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class cetak extends Route{

    private $sn = 'cetakData';

    public function invoicePembelianBb($kdInvoice)
    {
        $capInvoice = strtoupper($kdInvoice);
        //data header 
        $logo = $this -> state($this -> sn) -> getLogo();
        //ambil data pembelian bahan baku 
        $qPembelian = $this -> state($this -> sn) -> getPembelianBb($kdInvoice);
        $totalPembelian = number_format($qPembelian['total']);
        $namaMitra = $this -> state($this -> sn) ->  getNamaMitra($qPembelian['mitra']);
        //start PDF rendering
        $dompdf = new Dompdf();
        $html = "<table><tr><td><img src='ladun/".$logo."' style='width:150px'></td>"; 
        $html .= "<td><span style='font-size:30px;font-family:calibri;'>Invoice Pembelian Bahan Baku</span><br/> NadhaResto, Jln Pantai Cermin No 18</td></tr></table>";
        $html .= "<hr/>";
        $html .= "Kode Invoice : ".$capInvoice."<br/>";
        $html .= "Mitra : ".$namaMitra."<br/>";
        $html .= "Waktu : ".$qPembelian['waktu']."<br/>";
        $html .= "Total Pembelian : Rp. ".$totalPembelian."<br/>";
        $html .= "<table border='1' style='margin-top:15px;border-collapse:collapse;border:0px;font-size:14px;width:100%;'><tr><th>Kd Bahan</th><th>Nama Bahan</th><th>Qt</th></tr></table>";

        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('invoice_pembelian.pdf', array("Attachment" => false));
    }

}