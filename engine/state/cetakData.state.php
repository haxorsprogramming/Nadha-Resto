<?php 

class cetakData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getPembelianBb($kdPembelian)
    {
        $this -> st -> query("SELECT * FROM tbl_pembelian_bahan_baku WHERE kd_pembelian='$kdPembelian';");
        return $this -> st -> querySingle();
    }

    public function getNamaMitra($kdMitra)
    {
        $this -> st -> query("SELECT nama FROM tbl_mitra WHERE kd_mitra='$kdMitra';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }

    public function getLogo()
    {
        $this -> st -> query("SELECT value FROM tbl_setting WHERE kd_setting='logo_resto';");
        $q = $this -> st -> querySingle();
        return $q['value'];
    }

    public function getDataTemp($kdPembelian)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pembelian_bahan_baku WHERE kd_pembelian='$kdPembelian';");
        return $this -> st -> queryAll();
    }

    public function getBahanData($kdBahan)
    {
        $this -> st -> query("SELECT * FROM tbl_bahan_baku WHERE kd_bahan='$kdBahan';");
        return $this -> st -> querySingle(); 
    }

}