<?php

class pesanan extends Route{

    private $sn = 'pesananData';

    public function index()
    {
        $data['daftarPesanan'] = $this -> state($this -> sn) -> getDataPesanan();
        $this -> bind('dasbor/pesanan/pesanan', $data);
    }

    public function pesananBaru()
    {
        $data['meja']       = $this -> state($this -> sn) -> getDataMeja();
        $data['pelanggan']  = $this -> state($this -> sn) -> getDataPelanggan();
        $data['kategori']   = $this -> state($this -> sn) -> getDataKategori();
        $this -> bind('dasbor/pesanan/buatPesanan', $data);
    }

    public function getMenuKategori()
    {
        $kdKategori     = $this -> inp('kdMenu');
        $data['menu']   = $this -> state($this -> sn) -> getMenuWithKategori($kdKategori);
        $this -> toJson($data);
    }

    public function buatPesanan()
    {
        $kdPelanggan        = $this -> inp('pelanggan');
        $tipe               = $this -> inp('tipe');
        $jlhTamu            = $this -> inp('jlhTamu');
        $kdPesanan          = $this -> rnstr(15);
        $waktuMasuk         = $this -> waktu();
        $operator           = $this -> getses('userSes');
        $meja               = $this -> inp('mejaId');
        //simpan ke tabel pesanan
        $this -> state($this -> sn) -> buatPesanan($kdPesanan, $kdPelanggan, $tipe, $jlhTamu, $waktuMasuk, $operator, $meja);
        //update status meja
        $this -> state($this -> sn) -> updateStatusMeja($meja);
        //update jumlah tamu meja 
        $this -> state($this -> sn) -> updateJumlahTamu($jlhTamu, $meja);
        $data['status']     = 'sukses';
        $data['kdPesanan']  = $kdPesanan; 
        $this -> toJson($data);
    }

    public function updatePesanan($kdPesanan)
    {
        $data['kdPesanan'] = $kdPesanan;
        $this -> bind('dasbor/pesanan/updatePesanan', $data);
    }

    public function updateTempPesanan()
    {
        $kdMenu     = $this -> inp('kdMenu');
        $kdPesanan  = $this -> inp('kdPesanan');
        $hargaAt    = $this -> inp('hargaAt');
        $qt         = $this -> inp('qt');
        $total      = $this -> inp('total');
        $kdTemp     = $this -> rnstr(20);
        $this -> state($this -> sn) -> updateTempPesanan($kdTemp, $kdMenu, $kdPesanan, $hargaAt, $qt, $total);
    }

    public function getDetailPesanan()
    {
        $kdPesanan              = $this -> inp('kdPesanan');
        $dp                     = $this -> state($this -> sn) -> getDetailPesanan($kdPesanan);
        $data['jlhTamu']        = $dp['jumlah_tamu'];
        $data['namaPelanggan']  = $this -> state('utilityData') -> getNamaPelanggan($dp['pelanggan']);
        $data['meja']           = $this -> state('utilityData') -> getNamaMeja($dp['meja']);
        $this -> toJson($data);
    }

    public function getTempFirst()
    {
        $kdPesanan  = $this -> inp('kdPesanan');
        $dtp        = $this -> state($this -> sn) -> getTempFirst($kdPesanan);
        foreach($dtp as $dp) {
            $arrTemp['kdMenu']      = $dp['kd_menu'];
            $arrTemp['hargaAt']     = $dp['harga_at'];
            $arrTemp['namaMenu']    = $this -> state('utilityData') -> getNamaMenu($dp['kd_menu']);
            $arrTemp['total']       = $dp['total'];
            $arrTemp['qt']          = $dp['qt'];
            $data['pesanan'][]      = $arrTemp;
        }
        $this -> toJson($data);
    }

    public function hapusTempLama()
    {
        $kdPesanan = $this -> inp('kdPesanan');
        $this -> state($this -> sn) -> hapusTempLama($kdPesanan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}