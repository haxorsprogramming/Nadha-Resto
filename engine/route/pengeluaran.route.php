<?php

class pengeluaran extends Route{

    private $sn = 'pengeluaranData';

    public function pembelianBahanBaku()
    {
        $data['mitra'] = $this -> state($this -> sn) -> getMitra();
        $this -> bind('dasbor/pengeluaran/pembelianBahanBaku', $data);
    }

    public function getDataBahanBakuKategori()
    {
        $kategori = $this -> inp('kategori');
        $data['bahanBaku'] = $this -> state($this -> sn) -> getDataBahanBakuKategori($kategori);
        $this -> toJson($data);
    }

}