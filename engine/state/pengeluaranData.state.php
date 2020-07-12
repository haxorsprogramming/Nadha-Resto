<?php 

class pengeluaranData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataBahanBakuKategori($kategori)
    {
        $this -> st -> query("SELECT * FROM tbl_bahan_baku WHERE kategori='$kategori';");
        return $this -> st -> queryAll();
    }

}