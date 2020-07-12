<?php

class meja extends Route{

    private $sn = 'mitraData';
    
    public function index()
    {
        $this -> bind('dasbor/mitra/mitra');
    }

}