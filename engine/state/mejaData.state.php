<?php 

class mejaData{
   
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

    public function cekMeja($nama)
    {
        $this -> st -> query("SELECT id FROM tbl_meja WHERE nama='$nama';");
        return $this -> st -> numRow();
    }

    public function tambahMeja($kdMeja, $nama, $deks, $waktu)
    {
        $query = "INSERT INTO tbl_meja VALUES(null, '$kdMeja','$nama','$deks','leave','0','$waktu');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function hapusMeja($kdMeja)
    {
        $query = "DELETE FROM tbl_meja WHERE kd_meja='$kdMeja';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }


}