<?php

class bahanBaku extends Route{

    private $sn = 'bahanBakuData';

    public function index()
    {
        $data['bahanBaku'] = $this -> state($this -> sn) -> getDataBahanBaku();
        $this -> bind('dasbor/bahanBaku/bahanBaku', $data);
    }

    public function tambahBahanBaku()
    {
        // {'nama':nama, 'deks':deks, 'satuan':satuan, 'kategori':kategori, 'stok':stok}
        $nama = $this -> inp('nama');
        $deks = $this -> inp('deks');
        $satuan = $this -> inp('satuan');
        $kategori = $this -> inp('kategori');
        $stok = $this -> inp('stok');
        $kdBahan = $this -> rnint(4);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}