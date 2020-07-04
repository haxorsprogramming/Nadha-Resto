<?php 

class monitoringData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataMeja()
    {
        $this -> st -> query("SELECT * FROM tbl_meja;");
        return $this -> st -> queryAll();
    }

    public function getJumlahTamu($kdMeja)
    {
        $this -> st -> query("SELECT jumlah_tamu FROM tbl_pesanan WHERE meja='$kdMeja' AND status='active';");
        $q = $this -> st -> querySingle();
        return $q['jumlah_tamu'];
    }


}