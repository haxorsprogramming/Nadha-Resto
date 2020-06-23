<?php 

class pelangganData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getPelanggan()
    {
        $this -> st -> query("SELECT * FROM tbl_pelanggan;");
        return $this -> st -> queryAll();
    }

}