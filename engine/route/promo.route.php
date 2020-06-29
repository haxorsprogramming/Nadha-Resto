<?php

class promo extends Route{

    private $sn = 'promoData';

    public function index()
    {
        $this -> bind('dasbor/promo/promo');
    }

}