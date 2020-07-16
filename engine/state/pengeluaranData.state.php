<?php 

class pengeluaranData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataPengeluaran()
    {
        $this -> st -> query("SELECT * FROM tbl_pengeluaran;");
        return $this -> st -> queryAll();
    }
    
    public function prosesPengeluaran($kdPengeluaran, $nama, $deks, $kategori, $total, $operator, $waktu)
    {
        $query = "INSERT INTO tbl_pengeluaran VALUES(null, '$kdPengeluaran','$nama','$deks','$kategori','$total','$operator','$waktu');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }
}
