<?php 

class bahanBakuData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataBahanBaku()
    {
        $this -> st -> query("SELECT * FROM tbl_bahan_baku;");
        return $this -> st -> queryAll();
    }

}