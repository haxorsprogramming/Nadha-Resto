<?php

class pengeluaran extends Route{

    private $sn = 'pengeluaranData';

    public function pembelianBahanBaku()
    {
        $this -> bind('dasbor/pengeluaran/pembelianBahanBaku');
    }

    public function getDataBahanBakuKategori()
    {
        $kategori = $this -> inp('kategori');
        $data['bahanBaku'] = $this -> state($this -> sn) -> getDataBahanBakuKategori($kategori);
        $this -> toJson($data);
    }

}