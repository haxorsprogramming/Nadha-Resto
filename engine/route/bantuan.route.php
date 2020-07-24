<?php

class bantuan extends Route{
    //inisialisasi state
    private $sn = 'bantuanData';
    private $su = 'utilityData';

    public function tesServerSide()
    {
        
        $this -> bind('dasbor/bantuan/tesServerSide');
    }

}