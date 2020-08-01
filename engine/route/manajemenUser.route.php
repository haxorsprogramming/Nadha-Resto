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
        // {username : this.username, password : this.password, tipeUser : this.tipeUser, nama : this.nama}
        $username = $this -> inp('username');
        $password = $this -> inp('password');
        $nama = $this -> inp('tipeUser');
        $tipe = $this -> inp('nama');
        $passHash = $this -> hashPassword($password);
        $waktu = $this -> waktu();
        $data['user'] = $this -> state($this -> sn) -> cekUsername($username);
        $data['status'] = $username;
        $this -> toJson($data);
    }

}