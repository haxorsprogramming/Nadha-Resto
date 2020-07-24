<?php

class pengeluaran extends Route{
    //inisialisai state
    private $sn = 'pengeluaranData';
    private $su = 'utilityData';

    public function index()
    {
        //get data pengeluaran
        $data['pengeluaran'] = $this -> state($this -> sn) -> getDataPengeluaran();
        $this -> bind('dasbor/pengeluaran/pengeluaran', $data);
    }

    public function prosesPengeluaran()
    {
        //buat kode pengeluaran
        $kdPengeluaran  = $this -> rnstr(20);
        //ambil post data dari form
        $nama           = $this -> inp('nama');
        $deks           = $this -> inp('deks');
        $kategori       = $this -> inp('kategori');
        //clearkan tanda (.) pada nilai total
        $total          = str_replace('.', '', $this -> inp('total'));
        $waktu          = $this -> waktu();
        $operator       = $this -> getses('userSes');
        //simpan data pengeluaran
        $this -> state($this -> sn) -> prosesPengeluaran($kdPengeluaran, $nama, $deks, $kategori, $total, $operator, $waktu);
        //simpan ke arus kas 
        $this -> state($this -> su) -> simpanArusKas($kdPengeluaran, 'Pengeluaran resto', 'keluar', $total, $waktu, $operator);
        $data['status'] = 'sukses';
        //send respon json
        $this -> toJson($data);
    }

}