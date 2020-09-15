<?php

class manajemenUser extends Route{

    private $sn = 'manajemenUserData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['user'] = $this -> state($this -> sn) -> getUser();
        $this -> bind('dasbor/manajemenUser/manajemenUser', $data);
    }

    public function tambahUser()
    {
        $this -> state($this -> su) -> csrfCek();
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
        $this -> state($this -> su) -> csrfCek();
        $username = $this -> inp('username');
        $data['user'] = $this -> state($this -> sn) -> getDataUser($username);
        $this -> toJson($data);
    }

    public function updateUserProses()
    {
        $this -> state($this -> su) -> csrfCek();
        $username = $this -> inp('username');
        $password = $this -> inp('password');
        $tipe = $this -> inp('tipe');
        $nama = $this -> inp('nama');
        $passHash = $this -> hashPassword($password);
        $this -> state($this -> sn) -> updateUser($nama, $passHash, $tipe, $username);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function hapusUser()
    {
        $this -> state($this -> su) -> csrfCek();
        $username = $this -> inp('username');
        if($username === 'admin'){
            $data['status'] = 'error';
        }else{
            $this -> state($this -> sn) -> hapusUser($username);
            $data['status'] = 'sukses';
        }
        $this -> toJson($data);
    }
}