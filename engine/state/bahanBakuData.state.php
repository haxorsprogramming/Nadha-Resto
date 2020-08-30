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

    public function cekNamaBahan($nama)
    {
        $this -> st -> query("SELECT * FROM tbl_bahan_baku WHERE nama='$nama';");
        $jBahan = $this -> st -> numRow();
        if($jBahan > 0){
            return true;
        }else{
            return false;
        }
    }

    public function detailBahanBaku($kdBahan)
    {
        $this -> st -> query("SELECT * FROM tbl_bahan_baku WHERE kd_bahan='$kdBahan';");
        return $this -> st -> querySingle();
    }

    public function updateBahanBaku($nama, $deks, $kategori, $satuan, $stok, $kdBahan)
    {
        $query = "UPDATE tbl_bahan_baku SET nama='$nama', deks='$deks', kategori='$kategori', satuan='$satuan', stok='$stok' WHERE kd_bahan='$kdBahan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function hapusBahanBaku($kdBahan)
    {
        $query = "DELETE FROM tbl_bahan_baku WHERE kd_bahan='$kdBahan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getTotalKonsumsi($kdBahan)
    {
        $this -> st -> query("SELECT SUM(qt) FROM tbl_temp_pembelian_bahan_baku WHERE kd_item='$kdBahan';");
        $q = $this -> st -> querySingle();
        return $q['SUM(qt)'];
    }

    public function getHistoriPembelian($kdBahan)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pembelian_bahan_baku WHERE kd_item='$kdBahan';");
        return $this -> st -> queryAll();
    }

}