<?php

class promo extends Route{

    private $sn = 'promoData';

    public function index()
    {
        $data['promo'] = $this -> state($this -> sn) -> getPromoData();
        $this -> bind('dasbor/promo/promo', $data);
    }

    public function tambahPromo()
    {
        
    }

}