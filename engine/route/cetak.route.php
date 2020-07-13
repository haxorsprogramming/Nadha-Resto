<?php

require_once 'lib/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

class cetak extends Route{

    private $sn = 'bahanBakuData';

    public function invoicePembelian()
    {
        $dompdf = new Dompdf();
        $html = "<div style='text-align:center;margin-top:-20px;'><img src='ladun/logo.png' style='width:200px;'></h2>";
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'landscape');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('laporan_tahun.pdf', array("Attachment" => false));
    }

}