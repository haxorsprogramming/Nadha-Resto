<?php 

class laporanTransaksiData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function transaksiMasukTahun($tahunAwal, $tahunAkhir)
    {
        $this -> st -> query("SELECT id FROM tbl_arus_kas WHERE(waktu BETWEEN '$tahunAwal' AND '$tahunAkhir') AND arus='masuk';");
        return $this -> st -> numRow();
    }

    public function nominalTransaksiMasukTahun($tahunAwal, $tahunAkhir)
    {
        $this -> st -> query("SELECT SUM(total) FROM tbl_arus_kas WHERE(waktu BETWEEN'$tahunAwal' AND '$tahunAkhir') AND arus='masuk';");
        $q = $this -> st -> querySingle();
        return $q['SUM(total)'];
    }

}