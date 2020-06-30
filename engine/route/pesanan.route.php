<?php

class pesanan extends Route{

    private $sn = 'promoData';

    public function index()
    {
        $this -> bind('dasbor/pesanan/pesanan');
    }

}