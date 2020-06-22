<?php

class utility extends Route{

    public function tesHash()
    {
        $password = $this ->  hashPassword('admin');
        echo $password;
    }

    public function verifPass()
    {
        $pass = 'admin';
        $username = 'admin';
        
        $userPassword = $this -> state('loginData') -> getPassword($username);
        $checkPassword = $this -> verifPassword($pass, $userPassword);

        if($checkPassword == true){
            $data['status_login'] = 'sukses';
        }else{
            $data['status_login'] = 'gagal';
        }

        $this -> toJson($data);
    }
}