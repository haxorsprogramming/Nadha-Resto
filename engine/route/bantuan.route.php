<?php

class bantuan extends Route{
    //inisialisasi state
    private $su = 'utilityData';

    public function index()
    {
        $data['bantuan'] = $this -> state($this -> su) -> getBantuan();
        $this -> bind('dasbor/bantuan/bantuan', $data);
    }

}