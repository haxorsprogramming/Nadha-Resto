<?php

class tentangAplikasi extends Route{

    private $sn = 'tentangAplikasi';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/tentangAplikasi/tentangAplikasi');
    }

}