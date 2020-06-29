<?php

class meja extends Route{

    private $sn = 'mejaData';

    public function index()
    {   $data['meja'] = $this -> state($this -> sn) -> getDataMeja();     
        $this -> bind('dasbor/meja/meja', $data);
    }

    public function tambahMeja()
    {

    }

}