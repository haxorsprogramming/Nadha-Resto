<?php

class laporanTransaksi extends Route{

    private $sn = 'laporanTransaksiData';
    private $su = 'utilityData';

    public function index()
    {
        $data['tahunAwal'] = $this -> state($this -> su) -> getSettingResto('awal_pembukuan');
        $this -> bind('dasbor/laporanTransaksi/laporanTransaksi', $data);
    }

}