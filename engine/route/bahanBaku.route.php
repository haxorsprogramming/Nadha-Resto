<?php

class bahanBaku extends Route{

    private $sn = 'bahanBakuData';

    public function index()
    {
        $this -> bind('dasbor/bahanBaku/bahanBaku');
    }

}