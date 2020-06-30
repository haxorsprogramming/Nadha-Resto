<?php

class pesanan extends Route{

    private $sn = 'pesananData';

    public function index()
    {
        $data['meja'] = $this -> state($this -> sn) -> getDataMeja();
        $this -> bind('dasbor/pesanan/pesanan', $data);
    }

}