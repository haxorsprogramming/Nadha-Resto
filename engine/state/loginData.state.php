<?php 

class loginData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function cekUser($user, $passHash)
    {
        $this -> st -> query("SELECT id FROM tbl_user WHERE username='$user' AND password='$passHash';");
        return $this -> st -> numRow();
    }

}