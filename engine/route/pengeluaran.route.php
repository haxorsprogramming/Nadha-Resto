<?php

class pengeluaran extends Route{

    private $sn = 'pengeluaranData';
    private $su = 'utilityData';

    public function index()
    {
        $data['pengeluaran'] = $this -> state($this -> sn) -> getDataPengeluaran();
        $this -> bind('dasbor/pengeluaran/pengeluaran', $data);
    }

    public function prosesPengeluaran()
    {
        $kdPengeluaran = $this -> rnstr(20);
        $nama = $this -> inp('nama');
        $deks = $this -> inp('deks');
        $kategori = $this -> inp('kategori');
        $total = str_replace('.', '', $this -> inp('total'));
        $waktu = $this -> waktu();
        $operator = $this -> getses('userSes');
        $this -> state($this -> sn) -> prosesPengeluaran($kdPengeluaran, $nama, $deks, $kategori, $total, $operator, $waktu);
        //simpan ke arus kas 
        $this -> state($this -> su) -> simpanArusKas($kdPengeluaran, 'Pengeluaran resto', 'keluar', $total, $waktu, $operator);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}