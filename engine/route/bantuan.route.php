<?php

class bantuan extends Route{

    private $sn = 'bantuanData';
    private $su = 'utilityData';

    public function tesServerSide()
    {
        $this -> bind('dasbor/bantuan/tesServerSide');
    }

}