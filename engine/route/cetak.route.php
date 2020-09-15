<?php
// IMPORT LIBRARY DOMPDF
require_once 'lib/dompdf/autoload.inc.php';
// IMPORT LIBRARY ESCOPOS 
require_once 'lib/escopos/autoload.php';

use Dompdf\Dompdf;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

class cetak extends Route{

    private $sn = 'cetakData';
    private $su = 'utilityData';
    private $connector;
    private $printer;

    public function invoicePembelianBb($kdInvoice)
    {
        // Variabel DomPdf
        $dompdf         = new Dompdf();

        // Prepare data
        $tempPembelian  = $this -> state($this -> sn) -> getDataTemp($kdInvoice);
        $capInvoice     = strtoupper($kdInvoice);
        
        // Data header 
        $logo = $this -> state($this -> sn) -> getSetting('logo_resto');
        $namaResto      = $this -> state($this -> sn) -> getSetting('nama_resto');
        $alamatResto    = $this -> state($this -> sn) -> getSetting('alamat_resto');
        
        // Ambil data pembelian bahan baku 
        $qPembelian     = $this -> state($this -> sn) -> getPembelianBb($kdInvoice);
        $totalPembelian = number_format($qPembelian['total']);
        $namaMitra      = $this -> state($this -> sn) ->  getNamaMitra($qPembelian['mitra']);
        $waktu          = date('d M Y', strtotime($qPembelian['waktu']));
        
        // Insert HTML value
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
        
        // Insert data to tabel
        foreach($tempPembelian as $tp){
            $qBahan = $this -> state($this -> sn) -> getBahanData($tp['kd_item']);
            $html .= "<tr><td style='padding-left:10px;'>".$qBahan['nama']."</td><td style='padding-left:10px;'>".$qBahan['satuan']."</td><td style='padding-left:10px;'>".$tp['qt']."</td></tr>";
        }
        
        $html .= "</table>";
        $html .= "<div style='margin-top:20px;'>".$waktu."</div>";
        $html .= "<div style='margin-top:20px;'>".$namaResto."</div>";

        // Render html variabel to dompdf
        $dompdf -> loadHtml($html);

        // Setting ukuran dan orientasi kertas
        $dompdf -> setPaper('A4', 'landscape');
        
        // Rendering dari HTML Ke PDF
        $dompdf -> render();
        
        // Melakukan output file Pdf
        $dompdf -> stream('invoice_pembelian.pdf', array("Attachment" => false));
    }

    public function invoicePengeluaranResto($kdPengeluaran)
    {
        $dompdf         = new Dompdf();
        //data pengeluaran 
        $pengeluaran    = $this -> state($this -> sn) -> getDataPengeluaran($kdPengeluaran);
        $waktu          = date('d M Y', strtotime($pengeluaran['waktu']));
        //data header 
        $logo           = $this -> state($this -> sn) -> getSetting('logo_resto');
        $namaResto      = $this -> state($this -> sn) -> getSetting('nama_resto');
        $alamatResto    = $this -> state($this -> sn) -> getSetting('alamat_resto');
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
        $dompdf -> loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf -> setPaper('A4', 'landscape');
        // Rendering dari HTML Ke PDF
        $dompdf -> render();
        // Melakukan output file Pdf
        $dompdf -> stream('invoice_pengeluaran.pdf', array("Attachment" => false));
    }


    public function invoicePemesanan($kdPembelian)
    {
        // CETAK KE PRINTER THERMAL
        $this->connector = new NetworkPrintConnector("127.0.0.1", "3300");
    }

    public function laporanTransaksiTahun($tahun)
    {
        $dompdf         = new Dompdf();
        //data header 
        $logo           = $this -> state($this -> sn) -> getSetting('logo_resto');
        $namaResto      = $this -> state($this -> sn) -> getSetting('nama_resto');
        $alamatResto    = $this -> state($this -> sn) -> getSetting('alamat_resto');
        $waktu          = date('d M Y', strtotime($this -> waktu()));
        //Insert HTML value
        $html = "<table><tr><td><img src='ladun/".$logo."' style='width:150px'></td>";
        $html .= "<td><span style='font-size:30px;font-family:calibri;'>Laporan Transaksi Tahunan</span><br/> ".$namaResto.", ".$alamatResto."</td></tr></table>";
        $html .= "<hr/>";
        $html .= "<h5>Tahun Laporan : ".$tahun."</h5>";
        
        $html .= "<table border='1' style='margin-top:15px;border-collapse:collapse;border:0px;font-size:14px;width:100%;'>";
        $html .= "<tr><th>Bulan</th><th>Total Transaksi Masuk</th><th>Total Transaksi Keluar</th><th>Nominal Transaksi Masuk</th><th>Nominal Transaksi Keluar</th></tr>";
        for($x = 0; $x < 12; $x++){
            $blnToListInt   = $this -> getListBulanInt();
            $bulanFixInt    = $blnToListInt[$x];
            $blnFilterFromX = $x + 1;
            $blnCap = $this -> bulanIndo($bulanFixInt);
            $jlhDay = $this -> ambilHari($blnFilterFromX);
            //prepare data filter
            $start =  $tahun."-".$bulanFixInt."-1 00:00:00";
            $finish = $tahun."-".$bulanFixInt."-".$jlhDay." 23:59:59";
            //data transaksi 
            $jlhTransaksiMasuk      = $this -> state('laporanTransaksiData') -> transaksiAwal($start, $finish, 'masuk');
            $nominalTransaksiMasuk  = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'masuk');
            $jlhTransaksiKeluar     = $this -> state('laporanTransaksiData') -> transaksiAwal($start, $finish, 'keluar');
            $nominalTransaksiKeluar = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'keluar');
            $html .= "<tr><td> ".$blnCap."</td><td> Rp.".$jlhTransaksiMasuk."</td><td> ".$jlhTransaksiKeluar."</td>";
            $html .= "<td> Rp. ".number_format($nominalTransaksiMasuk)."</td><td> Rp.".number_format($nominalTransaksiKeluar)."</td></tr>";
        }
        $html .= "";
        $html .= "</table>";
        $html .= "<h6>Tanggal cetak ".$waktu."</h6><br/>"; 
        $html .= "<div style='margin-top:20px;'>".$namaResto."</div>";
        //render HTML
        $dompdf -> loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf -> setPaper('A4', 'portait');
        // Rendering dari HTML Ke PDF
        $dompdf -> render();
        // Melakukan output file Pdf
        $dompdf -> stream('laporan_transaksi_tahun_'.$tahun.'.pdf', array("Attachment" => false));        
    }

    public function laporanTransaksiBulan($tahun, $bulan)
    {
        $dompdf = new Dompdf();
        //data header 
        $logo = $this -> state($this -> sn) -> getSetting('logo_resto');
        $namaResto = $this -> state($this -> sn) -> getSetting('nama_resto');
        $alamatResto = $this -> state($this -> sn) -> getSetting('alamat_resto');
        $waktu = date('d M Y', strtotime($this -> waktu()));
        $blnToArray = $bulan - 1;
        $blnInt = $this -> getListBulanInt();
        $bulanFix = $blnInt[$blnToArray];
        $bulanIndo = $this -> bulanIndo($bulan);
        $tHari = $this -> ambilHari($bulan);
        //Insert HTML value
        $html = "<table><tr><td><img src='ladun/".$logo."' style='width:150px'></td>";
        $html .= "<td><span style='font-size:30px;font-family:calibri;'>Laporan Transaksi Bulanan</span><br/> ".$namaResto.", ".$alamatResto."</td></tr></table>";
        $html .= "<hr/>";
        $html .= "<h5>Bulan Laporan : ".$bulanIndo." ".$tahun."</h5>";

        $html .= "<table border='1' style='margin-top:15px;border-collapse:collapse;border:0px;font-size:14px;width:100%;'>";
        $html .= "<tr><th>Tanggal</th><th>Total Transaksi Masuk</th><th>Total Transaksi Keluar</th><th>Nominal Transaksi Masuk</th><th>Nominal Transaksi Keluar</th></tr>";
        $jTMasuk = 0;
        $jTKeluar = 0;
        $tTMasuk = 0;
        $tTKeluar = 0;
        for($x = 0; $x < $tHari; $x++){
            $tglFix = $x + 1;
            $tglToCap = $this -> getTanggalBedaDigit($tglFix);
            $tanggalFix = $tahun."-".$bulanFix."-".$tglToCap;
            $start = $tanggalFix." 00:00:00";
            $finish = $tanggalFix." 23:59:59";
            //data transaksi 
            $jlhTransaksiMasuk = $this -> state('laporanTransaksiData') -> transaksiAwal($start, $finish, 'masuk');
            $nominalTransaksiMasuk = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'masuk');
            $jlhTransaksiKeluar = $this -> state('laporanTransaksiData') -> transaksiAwal($start, $finish, 'keluar');
            $nominalTransaksiKeluar = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'keluar'); 
            $jTMasuk = $jTMasuk + $jlhTransaksiMasuk;
            $jTKeluar = $jTKeluar + $jlhTransaksiKeluar;
            $tTMasuk = $tTMasuk + $nominalTransaksiMasuk;
            $tTKeluar = $tTKeluar + $nominalTransaksiKeluar;
            //render
            $html .= "<tr>";
            $html .= "<td>".$tglToCap."</td><td>".$jlhTransaksiMasuk."</td><td>".$jlhTransaksiKeluar."</td>";
            $html .= "<td>Rp. ".number_format($nominalTransaksiMasuk)."</td><td>Rp. ".number_format($nominalTransaksiKeluar)."</td>";
            $html .= "</tr>";
        }
        $html .= "<tr>"; 
        $html .= "<th>Total</th><th>".$jTMasuk."</th><th>".$jTKeluar."</th><th>Rp. ".number_format($tTMasuk)."</th><th>Rp. ".number_format($tTKeluar)."</th>"; 
        $html .= "</tr>";
        $html .= "</table>";
        $html .= "<h6>Tanggal cetak ".$waktu."</h6><br/>"; 
        $html .= "<div style='margin-top:20px;'>".$namaResto."</div>";
        //render HTML
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portait');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('invoice_pengeluaran.pdf', array("Attachment" => false));
    }

    public function laporanTransaksiTanggal($tahun, $bulan, $tanggal)
    {
        $dompdf = new Dompdf();
        //data header 
        $logo = $this -> state($this -> sn) -> getSetting('logo_resto');
        $namaResto = $this -> state($this -> sn) -> getSetting('nama_resto');
        $alamatResto = $this -> state($this -> sn) -> getSetting('alamat_resto');
        $waktu = date('d M Y', strtotime($this -> waktu()));
        $blnToArray = $bulan - 1;
        $blnInt = $this -> getListBulanInt();
        $bulanFix = $blnInt[$blnToArray];
        $bulanIndo = $this -> bulanIndo($bulan);
        $tanggalFix = $tahun."-".$bulan."-".$tanggal;
        $start = $tanggalFix." 00:00:00";
        $finish = $tanggalFix." 23:59:59";
        $dataTransaksi = $this -> state('laporanTransaksiData') -> getTransaksiTanggal($start, $finish);
        //Insert HTML value
        $html = "<table><tr><td><img src='ladun/".$logo."' style='width:150px'></td>";
        $html .= "<td><span style='font-size:30px;font-family:calibri;'>Laporan Transaksi Harian</span><br/> ".$namaResto.", ".$alamatResto."</td></tr></table>";
        $html .= "<hr/>";
        $html .= "<h5>Tanggal Laporan : ".$tanggal." ".$bulanIndo." ".$tahun."</h5>";
        $html .= "<table border='1' style='margin-top:15px;border-collapse:collapse;border:0px;font-size:14px;width:100%;'>";
        $html .= "<tr><th>Kd Transaksi</th><th>Waktu</th><th>Tipe</th><th>Arus</th><th>Operator</th><th>Total</th></tr>";
        foreach($dataTransaksi as $ds){
            $html .= "<tr>";
            $html .= "<td>".$ds['kd_transaksi']."</td>";
            $html .= "<td>".$ds['waktu']."</td>";
            $html .= "<td>".$ds['tipe']."</td>";
            $html .= "<td>".$ds['arus']."</td>";
            $html .= "<td>".$ds['operator']."</td>";
            $html .= "<td>Rp. ".number_format($ds['total'])."</td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        //render HTML
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portait');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('invoice_pengeluaran.pdf', array("Attachment" => false));
    }

}