<?php

class login extends Route{

    public function index()
    {       
        $this -> bind('/login/loginPage');
    }

    public function prosesLogin()
    {
        $user           = $this -> inp('username');
        $password       = $this -> inp('password');
        $passHash       = md5($password);
        $waktu          = $this -> waktu();
        $data['jlh']    = $this -> state('loginData') -> cekUser($user, $passHash);
        if($data['jlh'] > 0){
            $this -> setses('userSes',$user);
            $this -> state('loginData') -> updateLogin($waktu, $user);
        }else{

        }
        echo json_encode($data);
    }  

}
