<?php 

class utilityData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getNamaPelanggan($kdPelanggan)
    {
        $this -> st -> query("SELECT nama FROM tbl_pelanggan WHERE id_pelanggan='$kdPelanggan';");
        $qP = $this -> st -> querySingle();
        return $qP['nama'];
    }

    public function getNamaMeja($kdMeja)
    {
        $this -> st -> query("SELECT nama FROM tbl_meja WHERE kd_meja='$kdMeja';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }

    public function getNamaMenu($kdMenu)
    {
        $this -> st -> query("SELECT nama FROM tbl_menu WHERE kd_menu='$kdMenu';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }

    public function getDataMenu()
    {
        $this -> st -> query("SELECT * FROM tbl_menu;");
        return $this -> st -> queryAll();
    }

    public function getDataKategori()
    {
        $this -> st -> query("SELECT * FROM tbl_kategori_menu;");
        return $this -> st -> queryAll();
    }

    public function getDataMenuKategori($kdKategori)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kategori='$kdKategori';");
        return $this -> st -> queryAll();
    }

}