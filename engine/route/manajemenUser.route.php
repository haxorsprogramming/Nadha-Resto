<?php

class manajemenUser extends Route{

    private $sn = 'manajemenUser';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/manajemenUser/manajemenUser');
    }

}