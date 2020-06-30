<?php

class pesanan extends Route{

    private $sn = 'pesananData';

    public function index()
    {
        $data['meja'] = $this -> state($this -> sn) -> getDataMeja();
        $data['pelanggan'] = $this -> state($this -> sn) -> getDataPelanggan();
        $data['kategori'] = $this -> state($this -> sn) -> getDataKategori();
        $this -> bind('dasbor/pesanan/pesanan', $data);
    }

    public function getMenuKategori()
    {
        $kdKategori = $this -> inp('kdMenu');
        $data['menu'] = $this -> state($this -> sn) -> getMenuWithKategori($kdKategori);
        $this -> toJson($data);
    }

}