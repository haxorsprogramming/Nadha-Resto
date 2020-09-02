<?php 

class promoData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getPromoData()
    {
        $this -> st -> query("SELECT * FROM tbl_promo;");
        return $this -> st -> queryAll();
    }

    public function cekNamaPromo($namaPromo)
    {
        $this -> st -> query("SELECT id FROM tbl_promo WHERE nama='$namaPromo';");
        return $this -> st -> numRow();
    }

    public function tambahPromo($kdPromo, $namaPromo, $deks, $tipe, $nilai, $kuota, $tanggalExpired)
    {
         $query = "INSERT INTO tbl_promo VALUES(null, '$kdPromo', '$namaPromo', '$deks', '$tipe', '$nilai', '$kuota', '$tanggalExpired');";
         $this -> st -> query($query);
         $this -> st -> queryRun();
    }

    public function detailPromo($kdPromo)
    {
        $this -> st -> query("SELECT * FROM tbl_promo WHERE kd_promo='$kdPromo';");
        return $this -> st -> querySingle();
    }

    public function updatePromo($kdPromo, $nama, $deks, $tipe, $nilai, $kuota, $tanggalExpired)
    {
        $query = "UPDATE tbl_promo SET nama='$nama', deks='$deks', tipe='$tipe', value='$nilai', kuota='$kuota', tanggal_expired='$tanggalExpired' WHERE kd_promo='$kdPromo';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function deletePromo($kdPromo)
    {
        $query = "DELETE FROM tbl_promo WHERE kd_promo='$kdPromo';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

}