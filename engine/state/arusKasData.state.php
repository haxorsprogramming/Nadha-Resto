<?php 

class arusKasData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataArusKas($requestData)
    {
        $columns = array(0 => 'kd_transaksi', 1 => 'waktu', 2 => 'tipe', 3 => 'arus', 4 => 'total');
        $this -> st -> query("SELECT * FROM tbl_arus_kas ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ;");
        return $this -> st -> queryAll();
    }

    public function getJlhArusKas()
    {
        $this -> st -> query("SELECT * FROM tbl_arus_kas;");
        return $this -> st -> numRow();
    }

    public function cekTipeArus($kdTransaksi)
    {
        $this -> st -> query("SELECT tipe FROM tbl_arus_kas WHERE kd_transaksi='$kdTransaksi';");
        $q = $this -> st -> querySingle();
        return $q['tipe'];
    }

}