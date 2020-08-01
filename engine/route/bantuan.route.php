<?php

class bantuan extends Route{
    //inisialisasi state
    private $sn = 'bantuanData';
    private $su = 'utilityData';

    public function index()
    {
        
        $this -> bind('dasbor/bantuan/bantuan');
    }

}