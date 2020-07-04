<?php 

class pembayaranData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getPesananDetails($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_pesanan WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> querySingle();
    }

    public function getDataTempPesanan($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pesanan WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> queryAll();
    }

    public function getCapMenuName($kdMenu)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kd_menu='$kdMenu';");
        return  $this -> st -> querySingle();
    }

    public function getNamaPelanggan($kdPelanggan)
    {
        $this -> st -> query("SELECT nama FROM tbl_pelanggan WHERE id_pelanggan='$kdPelanggan';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }

    public function getCapMeja($kdMeja)
    {
        $this -> st -> query("SELECT nama FROM tbl_meja WHERE kd_meja='$kdMeja';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }

}