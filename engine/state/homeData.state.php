<?php 

class homeData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataSlider()
    {
        $this -> st -> query("SELECT * FROM tbl_slider;");
        return $this -> st -> queryAll();
    }

    public function getDataMenu()
    {
        $this -> st -> query("SELECT * FROM tbl_menu;");
        return $this -> st -> queryAll();
    }

    public function getKategoriMenu()
    {
        $this -> st -> query("SELECT * FROM tbl_kategori_menu;");
        return $this -> st -> queryAll();
    }

}