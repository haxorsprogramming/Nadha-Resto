<?php

class pesanan extends Route{

    private $sn = 'pesananData';

    public function index()
    {
        $data['meja'] = $this -> state($this -> sn) -> getDataMeja();
        $data['pelanggan'] = $this -> state($this -> sn) -> getDataPelanggan();
        $data['menu'] = $this -> state($this -> sn) -> getDataMenu();
        $this -> bind('dasbor/pesanan/pesanan', $data);
    }

}