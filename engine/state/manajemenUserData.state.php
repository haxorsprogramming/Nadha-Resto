<?php 

class manajemenUserData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getUser()
    {
        $this -> st -> query("SELECT username, nama, tipe, last_login FROM tbl_user;");
        return $this -> st -> queryAll();
    }

    public function cekUsername($username)
    {
        $this -> st -> query("SELECT id FROM tbl_user WHERE username='$username';");
        $nr = $this -> st -> numRow();
        if($nr < 1)
        {
            return false;
        }else{
            return true;
        }
    }

    public function tambahUser($username, $nama, $passHash, $tipe, $waktu)
    {
        $query = "INSERT INTO tbl_user VALUES(null,'$username','$nama','$passHash','$tipe','$waktu');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

}