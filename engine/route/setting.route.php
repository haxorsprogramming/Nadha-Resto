<?php

class setting extends Route{

    private $sn = 'settingData';

    public function index()
    {
        $this -> bind('dasbor/setting/setting');
    }

    public function getDataRestoran()
    {
        $data['namaResto'] = $this -> state($this -> sn) -> getSettingData('nama_resto');
        $data['alamatResto'] = $this -> state($this -> sn) -> getSettingData('alamat_resto');
        $this -> toJson($data);
    }

}