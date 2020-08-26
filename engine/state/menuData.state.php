<?php 

class menuData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getMenu()
    {
        $this -> st -> query("SELECT * FROM tbl_menu;");
        return $this -> st -> queryAll();
    }

    public function getKategori()
    {
        $this -> st -> query("SELECT * FROM tbl_kategori_menu;");
        return $this -> st -> queryAll();
    }

    public function prosesTambahMenu($kdMenu, $nama, $deks, $kategori, $satuan, $harga, $picName)
    {
        $query = "INSERT INTO tbl_menu VALUES(null, '$kdMenu', '$nama', '$deks','$kategori','$satuan','$harga','$picName','0','1');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function cariNamaMakanan($nama)
    {
        $this -> st -> query("SELECT id FROM tbl_menu WHERE nama='$nama';");
        return $this -> st -> numRow();
    }

    public function getDetailMenu($kdMenu)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kd_menu='$kdMenu';");
        return $this -> st -> querySingle();
    }

    public function hapusMenu($kdMenu)
    {
        $query = "DELETE FROM tbl_menu WHERE kd_menu='$kdMenu';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function updateMenu($namaMenu, $deksMenu, $kategori, $satuan, $hargaClear, $kdMenu)
    {
        $query = "UPDATE tbl_menu SET nama='$namaMenu', deks='$deksMenu', kategori='$kategori', satuan='$satuan', harga='$hargaClear' WHERE kd_menu='$kdMenu';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getPembelianMenu($kdMenu)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pesanan WHERE kd_menu='$kdMenu' LIMIT 0, 5;");
        return $this -> st -> queryAll();
    }

}