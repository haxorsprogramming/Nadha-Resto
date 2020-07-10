<?php 

class monitoringData{
   
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

    public function getJumlahTamu($kdMeja)
    {
        $this -> st -> query("SELECT jumlah_tamu FROM tbl_pesanan WHERE meja='$kdMeja' AND status='active';");
        $q = $this -> st -> querySingle();
        return $q['jumlah_tamu'];
    }

    public function setMejaActive($kdMeja)
    {
        $query = "UPDATE tbl_meja SET status='active' WHERE kd_meja='$kdMeja';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function setMejaLeave($kdMeja)
    {
        $query = "UPDATE tbl_meja SET status='leave' WHERE kd_meja='$kdMeja';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
        $qKosong = "UPDATE tbl_meja SET jlh_tamu='0' WHERE kd_meja='$kdMeja';";
        $this -> st -> query($qKosong);
        $this -> st -> queryRun();
    }

}