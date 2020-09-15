<?php

class tentangAplikasi extends Route{

    private $sn = 'tentangAplikasiData';
    private $su = 'utilityData';

    public function index()
    {
        $data['waktu'] = $this -> waktu();
        $this -> bind('dasbor/tentangAplikasi/tentangAplikasi', $data);
    }

}