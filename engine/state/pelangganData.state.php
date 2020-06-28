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

    public function tambahPelanggan($idPelanggan, $nama, $alamat, $hp, $email, $visit)
    {
        $query = "INSERT INTO tbl_pelanggan VALUES(null, '$idPelanggan','$nama','$alamat','$hp','$email','$visit');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getNamaHandphone($nama, $hp)
    {
        $this -> st -> query("SELECT id FROM tbl_pelanggan WHERE nama='$nama' AND no_hp='$hp';");
        return $this -> st -> numRow();
    }

}