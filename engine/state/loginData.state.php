<?php 

class loginData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getLogo()
    {
        $this -> st -> query("SELECT value FROM tbl_setting WHERE kd_setting='logo_resto';");
        $q = $this -> st -> querySingle();
        return $q['value'];
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