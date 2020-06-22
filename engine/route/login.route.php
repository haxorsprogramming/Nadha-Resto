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
        //get data password from database & verif
        $userPasswordDb = $this -> state('loginData') -> getPassword($user);
        $checkPassword  = $this -> verifPassword($password, $userPasswordDb);

        if($checkPassword == true){
            $this -> setses('userSes',$user);
            $this -> state('loginData') -> updateLogin($waktu, $user);
            $data['status_login'] = 'sukses';
        }else{
            $data['status_login'] = 'gagal';
        }

        echo json_encode($data);
    }  

}
