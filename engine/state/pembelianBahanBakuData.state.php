<?php 

class pembelianBahanBakuData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }
    
    public function getDataPembelianBahanBaku($requestData)
    {
        $columns = array(0 => 'kd_pembelian', 1 => 'mitra', 2 => 'total', 3 => 'waktu');
        $this -> st -> query("SELECT * FROM tbl_pembelian_bahan_baku ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length'].";");
        return $this -> st -> queryAll();
    }

    public function getTotalPembelianBahanBaku()
    {
        $this -> st -> query("SELECT id FROM tbl_pembelian_bahan_baku");
        return $this -> st -> numRow();
    }

    public function getMitra()
    {
        $this -> st -> query("SELECT * FROM tbl_mitra;");
        return $this -> st -> queryAll();
    }

    public function getNamaMitra($kdMitra)
    {
        $this -> st -> query("SELECT nama FROM tbl_mitra WHERE kd_mitra='$kdMitra';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }

    public function updateStok($kdItem, $qt)
    {
        //ambil nilai lama 
        $this -> st -> query("SELECT stok FROM tbl_bahan_baku WHERE kd_bahan='$kdItem';");
        $qBahan = $this -> st -> querySingle();
        $stokLama = $qBahan['stok'];
        $stokBaru = $stokLama + $qt;
        //update stok 
        $query = "UPDATE tbl_bahan_baku SET stok='$stokBaru' WHERE kd_bahan='$kdItem';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getDataBahanBakuKategori($kategori)
    {
        $this -> st -> query("SELECT * FROM tbl_bahan_baku WHERE kategori='$kategori';");
        return $this -> st -> queryAll();
    }

    public function prosesPembelian($kdPembelian, $mitra, $waktu, $nominal, $operator)
    {
        $query = "INSERT INTO tbl_pembelian_bahan_baku VALUES(null, '$kdPembelian', '$mitra', '$waktu', '$nominal', '$operator');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function updateTemp($kdTemp, $kdPembelian, $kdItem, $qt)
    {
        $query = "INSERT INTO tbl_temp_pembelian_bahan_baku VALUES(null, '$kdTemp', '$kdPembelian', '$kdItem', '$qt');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getDataPembelian($kdPembelian)
    {
        $this -> st -> query("SELECT * FROM tbl_pembelian_bahan_baku WHERE kd_pembelian='$kdPembelian';");
        return $this -> st -> querySingle();
    }
    
    public function getItemPembelian($kdPembelian)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pembelian_bahan_baku WHERE kd_pembelian='$kdPembelian';");
        return $this -> st -> queryAll();
    }

}