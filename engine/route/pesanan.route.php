<?php

class pesanan extends Route{

    private $sn = 'pesananData';

    public function index()
    {
        $data['daftarPesanan'] = $this -> state($this -> sn) -> getDataPesanan();
        $this -> bind('dasbor/pesanan/pesanan');
    }

    public function pesananBaru()
    {
        $data['meja'] = $this -> state($this -> sn) -> getDataMeja();
        $data['pelanggan'] = $this -> state($this -> sn) -> getDataPelanggan();
        $data['kategori'] = $this -> state($this -> sn) -> getDataKategori();
        $this -> bind('dasbor/pesanan/buatPesanan', $data);
    }

    public function getMenuKategori()
    {
        $kdKategori = $this -> inp('kdMenu');
        $data['menu'] = $this -> state($this -> sn) -> getMenuWithKategori($kdKategori);
        $this -> toJson($data);
    }

    public function buatPesanan()
    {
        $kdPelanggan = $this -> inp('pelanggan');
        $tipe = $this -> inp('tipe');
        $jlhTamu = $this -> inp('jlhTamu');
        $kdPesanan = $this -> rnstr(15);
        $waktuMasuk = $this -> waktu();
        $operator = $this -> getses('userSes');
        $this -> state($this -> sn) -> buatPesanan($kdPesanan, $kdPelanggan, $tipe, $jlhTamu, $waktuMasuk, $operator);
        $data['status'] = 'sukses';
        $data['kdPesanan'] = $kdPesanan; 
        $this -> toJson($data);
    }

    public function updateTempPesanan()
    {
        $kdMenu = $this -> inp('kdMenu');
        $kdPesanan = $this -> inp('kdPesanan');
        $hargaAt = $this -> inp('hargaAt');
        $qt = $this -> inp('qt');
        $total = $this -> inp('total');
        $kdTemp = $this -> rnstr(20);
        $this -> state($this -> sn) -> updateTempPesanan($kdTemp, $kdMenu, $kdPesanan, $hargaAt, $qt, $total);
    }

}