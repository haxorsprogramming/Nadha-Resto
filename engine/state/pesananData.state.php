<?php 

class pesananData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataMeja()
    {
        $this -> st -> query("SELECT * FROM tbl_meja;");
        return $this -> st ->  queryAll();
    }

    public function getDataPelanggan()
    {
        $this -> st -> query("SELECT * FROM tbl_pelanggan;");
        return $this -> st -> queryAll();
    }

    public function getDataKategori()
    {
        $this -> st -> query("SELECT * FROM tbl_kategori_menu;");
        return $this -> st -> queryAll();
    }

    public function getMenuWithKategori($kdKategori)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kategori='$kdKategori';");
        return $this -> st -> queryAll();
    }

}