<?php 

class loginData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getPassword($username)
    {
        $this -> st -> query("SELECT password FROM tbl_user WHERE username='$username';");
        $qUser = $this -> st -> querySingle();
        return $qUser['password'];
    }

    public function updateLogin($waktu, $user)
    {
      $query = "UPDATE tbl_user SET last_login='$waktu' WHERE username='$user';";
      $this -> st -> query($query);
      $this -> st -> queryRun();
    }

}