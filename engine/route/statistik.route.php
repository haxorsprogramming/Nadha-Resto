<?php

class statistik extends Route{

    private $sn = 'statistikData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/statistik/statistik');
    }

}