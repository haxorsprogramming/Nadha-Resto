<?php

class laporanTransaksi extends Route{

    private $sn = 'laporanTransaksiData';
    private $su = 'utilityData';

    public function index()
    {
        $data['tahunAwal'] = $this -> state($this -> su) -> getSettingResto('awal_pembukuan');
        $this -> bind('dasbor/laporanTransaksi/laporanTransaksiAwal', $data);
    }

    public function laporanTransaksiTahun($tahun)
    {
        $data['tahun'] = $tahun;
        $this -> bind('dasbor/laporanTransaksi/laporanTransaksiTahun', $data);
    }

}