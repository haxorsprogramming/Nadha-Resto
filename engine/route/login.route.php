<?php

class login extends Route{

    private $sn = 'loginData';
    private $su = 'utilityData';
    
    public function index()
    {   
        $data['pic'] = $this -> state($this -> sn) -> getLogo();    
        $this -> bind('/login/loginPage', $data);
    }

    public function prosesLogin()
    {
        $user           = $this -> inp('username');
        $password       = $this -> inp('password');
        $waktu          = $this -> waktu();
        //get data password from database & verif
        $userPasswordDb = $this -> state($this -> sn) -> getPassword($user);
        $checkPassword  = $this -> verifPassword($password, $userPasswordDb);

        if($checkPassword === true){
            $this -> setses('userSes', $user);
            $this -> state($this -> sn) -> updateLogin($waktu, $user);
            $data['status_login'] = 'sukses';
        }else{
            $data['status_login'] = 'gagal';
        }

        echo json_encode($data);
    }  

}
