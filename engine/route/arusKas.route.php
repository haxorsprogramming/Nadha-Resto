<?php

class arusKas extends Route{

    private $sn = 'arusKasData';
    private $su = 'utilityData';

    public function index()
    {
        $data['arusKas'] = $this -> state($this -> sn) -> getDataArusKas();
        $this -> bind('dasbor/arusKas/arusKas', $data);
    }

}