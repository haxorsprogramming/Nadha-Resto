<?php

class mitra extends Route{

    private $sn = 'mitraData';
    
    public function index()
    {
        $data['mitra'] = $this -> state($this -> sn) -> getMitra();
        $this -> bind('dasbor/mitra/mitra', $data);
    }

}