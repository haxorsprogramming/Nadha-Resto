<?php

class arusKas extends Route{
    //inisialisasi state
    private $sn = 'arusKasData';
    private $su = 'utilityData';

    public function index()
    {
        $data['arusKas'] = $this -> state($this -> sn) -> getDataArusKas();
        $data['saldoAwal'] = $this -> state($this -> su) -> getSettingResto('saldo_awal');
        $this -> bind('dasbor/arusKas/arusKas', $data);
    }

}