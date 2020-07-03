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

}