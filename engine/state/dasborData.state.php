<?php 

class dasborData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getUserData($username)
    {
        $this -> st -> query("SELECT * FROM tbl_user WHERE username='$username';");
        return $this -> st -> querySingle();
    }

}