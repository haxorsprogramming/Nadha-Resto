<?php

class manajemenUser extends Route{

    private $sn = 'manajemenUserData';
    private $su = 'utilityData';

    public function index()
    {
        $data['user'] = $this -> state($this -> sn) -> getUser();
        $this -> bind('dasbor/manajemenUser/manajemenUser', $data);
    }

    public function tambahUser()
    {
        $username = $this -> inp('username');
        $password = $this -> inp('password');
        $nama = $this -> inp('nama');
        $tipe = $this -> inp('tipeUser');
        $passHash = $this -> hashPassword($password);
        $waktu = $this -> waktu();
        $cu = $this -> state($this -> sn) -> cekUsername($username);
        if($cu === false){
            $this -> state($this -> sn) -> tambahUser($username, $nama, $passHash, $tipe, $waktu);
            $data['status'] = 'sukses';
        }else{
            $data['status'] = 'error';
        }
        $this -> toJson($data);
    }

    public function getUser()
    {
        $username = $this -> inp('username');
        $data['user'] = $this -> state($this -> sn) -> getDataUser($username);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}