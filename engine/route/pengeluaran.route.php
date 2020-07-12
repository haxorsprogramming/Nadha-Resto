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

    public function prosesPembelian()
    {
        // {'mitra':mitra, 'nominal':nominal}
        $kdPembelian = $this -> rnstr(15);
        $waktu = $this -> waktu();
        $mitra = $this -> inp('mitra');
        $nominal = $this -> inp('nominal');
        $operator = $this -> getses('userSes');
        $nominalClear = str_replace('.','',$nominal);
        $this -> state($this -> sn) -> prosesPembelian($kdPembelian, $mitra, $waktu, $nominalClear, $operator);
        $data['kdPembelian'] = $kdPembelian;
        $this -> toJson($data);
    }

}