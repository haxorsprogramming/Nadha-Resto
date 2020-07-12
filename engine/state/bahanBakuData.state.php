<?php 

class bahanBakuData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataBahanBaku()
    {
        $this -> st -> query("SELECT * FROM tbl_bahan_baku;");
        return $this -> st -> queryAll();
    }

    public function tambahBahan($kdBahan, $nama, $deks, $kategori, $satuan, $stok)
    {
        $query = "INSERT INTO tbl_bahan_baku VALUES(null, '$kdBahan','$nama','$deks','$kategori','$satuan','$stok','1');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function cekNamaBahan($kdBahan, $nama)
    {
        $this -> st -> query("SELECT * FROM tbl_bahan_baku WHERE kd_bahan='$kdBahan' AND nama='$nama';");
        return $this -> st -> numRow();
        // if($jBahan > 0){
        //     return true;
        // }else{
        //     return false;
        // }
    }

}