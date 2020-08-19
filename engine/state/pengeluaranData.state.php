<?php 

class pengeluaranData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataPengeluaran($requestData)
    {
        $columns = array(0 => 'nama', 1 => 'deks', 2 => 'kategori', 3 => 'total', 4 => 'operator');
        $this -> st -> query("SELECT * FROM tbl_pengeluaran ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length'].";");
        return $this -> st -> queryAll();
    }

    public function totalPengeluaran()
    {
        $this -> st -> query("SELECT id FROM tbl_pengeluaran;");
        return $this -> st -> numRow();
    }
    
    public function prosesPengeluaran($kdPengeluaran, $nama, $deks, $kategori, $total, $operator, $waktu)
    {
        $query = "INSERT INTO tbl_pengeluaran VALUES(null, '$kdPengeluaran','$nama','$deks','$kategori','$total','$operator','$waktu');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getDetailPengeluaran($kdPengeluaran)
    {
        $this -> st -> query("SELECT * FROM tbl_pengeluaran WHERE kd_pengeluaran='$kdPengeluaran';");
        return $this -> st -> querySingle();
    }

}
