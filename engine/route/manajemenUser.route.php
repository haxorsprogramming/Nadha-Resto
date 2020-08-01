<?php

class manajemenUser extends Route{

    private $sn = 'manajemenUserData';
    private $su = 'utilityData';

    public function index()
    {
        $data['user'] = $this -> state($this -> sn) -> getUser();
        $this -> bind('dasbor/manajemenUser/manajemenUser', $data);
    }

}