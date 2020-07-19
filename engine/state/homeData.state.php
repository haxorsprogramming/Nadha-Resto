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

    public function getMenuWithKategori($kdMenu)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kategori='$kdMenu';");
        return $this -> st -> queryAll();
    }

    public function getPromo()
    {
        $this -> st -> query("SELECT * FROM tbl_promo LIMIT 0,4;");
        return $this -> st -> queryAll();
    }

    public function saveTemp($kdTemp, $kdMenu, $qt, $hargaAt, $total)
    {
        $query = "INSERT INTO tbl_temp_self_service VALUES(null, '$kdTemp','$kdMenu','$qt','$hargaAt','$total');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

}