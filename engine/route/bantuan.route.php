<?php

class bantuan extends Route{

    private $su = 'utilityData';

    public function index()
    {
        $data['bantuan'] = $this -> state($this -> su) -> getBantuan();
        $this -> bind('dasbor/bantuan/bantuan', $data);
    }

}