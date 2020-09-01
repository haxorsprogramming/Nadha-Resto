<?php 

class mitraData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getMitra()
    {
        $this -> st -> query("SELECT * FROM tbl_mitra;");
        return $this -> st -> queryAll();
    }

    public function cekMitra($nama, $hp)
    {
        $this -> st -> query("SELECT id FROM tbl_mitra WHERE nama='$nama' OR hp='$hp';");
        $j = $this -> st -> numRow();
        if($j > 0){
            return false;
        }else{
            return true;
        }
    }

    public function tambahMitra($kdMitra, $nama, $deks, $alamat, $pemilik, $hp, $tipe)
    {
        $query = "INSERT INTO tbl_mitra VALUES(null, '$kdMitra','$nama','$deks','$alamat','$pemilik','$hp','1','$tipe');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function detailMitra($kdMitra)
    {
        $this -> st -> query("SELECT * FROM tbl_mitra where kd_mitra='$kdMitra';");
        return $this -> st -> querySingle();
    }

}
