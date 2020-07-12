<?php

class bahanBaku extends Route{

    private $sn = 'bahanBakuData';

    public function index()
    {
        $data['bahanBaku'] = $this -> state($this -> sn) -> getDataBahanBaku();
        $this -> bind('dasbor/bahanBaku/bahanBaku', $data);
    }

}