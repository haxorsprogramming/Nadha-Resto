<?php 

class promoData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getPromoData()
    {
        $this -> st -> query("SELECT * FROM tbl_promo;");
        return $this -> st -> queryAll();
    }

}