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

}