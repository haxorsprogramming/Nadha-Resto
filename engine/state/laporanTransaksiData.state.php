<?php 

class laporanTransaksiData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function transaksiAwal($tahunAwal, $tahunAkhir, $tipe)
    {
        $this -> st -> query("SELECT id FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwal' AND '$tahunAkhir') AND arus='$tipe';");
        return $this -> st -> numRow();
    }

    public function nominalTransaksiAwal($tahunAwal, $tahunAkhir, $tipe)
    {
        $this -> st -> query("SELECT SUM(total) FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwal' AND '$tahunAkhir') AND arus='$tipe';");
        $q = $this -> st -> querySingle();
        return $q['SUM(total)'];
    }

    public function getTransaksiTanggal($tahunAwal, $tahunAkhir)
    {
        $this -> st -> query("SELECT * FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwal' AND '$tahunAkhir');");
        return $this -> st -> queryAll();
    }

}