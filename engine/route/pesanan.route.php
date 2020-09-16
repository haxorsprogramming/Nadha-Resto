<?php

class pesanan extends Route{

    private $sn = 'pesananData';
    private $su = 'utilityData';

    public function index($page)
    {
        $this -> state($this -> su) -> csrfCek();
        $jlhPesanan             = $this -> state($this -> sn) -> getJlhPesanan();
        $jlhPaginasi            = ceil($jlhPesanan / 10);
        $data['jlhPesanan']     = $jlhPesanan;
        $data['jlhPaginasi']    = $jlhPaginasi;
        $data['pageNow']        = $page;
        $this -> bind('dasbor/pesanan/pesanan', $data);
    }

    public function getPesanan($page)
    {
        $this -> state($this -> su) -> csrfCek();
        $pesanan    = $this -> state($this -> sn) -> getDataPesanan($page);
        $jlhPesanan = $this -> state($this -> sn) -> getJlhPesanan();

        if($jlhPesanan < 1){
            $data['status'] = 'no_data';
        }else{
            foreach($pesanan as $ps){
                $arrTemp['kdPesanan']       = $ps['kd_pesanan'];
                $arrTemp['kdPelanggan']     = $ps['pelanggan'];
                $arrTemp['namaPelanggan']   = $this -> state($this -> su) -> getNamaPelanggan($ps['pelanggan']);
                $arrTemp['tipe']            = $ps['tipe'];
                $arrTemp['jumlahTamu']      = $ps['jumlah_tamu'];
                $arrTemp['waktuMasuk']      = $ps['waktu_masuk'];
                $arrTemp['waktuSelesai']    = $ps['waktu_selesai'];
                $arrTemp['meja']            = $this -> state($this -> su) -> getNamaMeja($ps['meja']);
                $arrTemp['status']          = $ps['status'];
                $arrTemp['operator']        = $ps['operator'];
                $data['pesanan'][]          = $arrTemp;
            }
            $data['status'] = 'success';
        }
        
        $this -> toJson($data);
    }

    public function getMaxPagePesanan()
    {
        $this -> state($this -> su) -> csrfCek();
        $jlhPesanan             = $this -> state($this -> sn) -> getJlhPesanan();
        $jlhPaginasi            = ceil($jlhPesanan / 10);
        $data['jlhPaginasi']    = $jlhPaginasi;
        $this -> toJson($data);
    }

    public function cariPesanan()
    {
        $this -> state($this -> su) -> csrfCek();
        $char = $this -> inp('char');
        //cek kd pesanan 
        $jlhPesanan = $this -> state($this -> sn) -> cariPesanan($char);
        if($jlhPesanan == 0){
            $data['status'] = 'error';
        }else{
            $pesanan = $this -> state($this -> sn) -> getDataPesananCari($char);
            foreach($pesanan as $ps){
                $arrTemp['kdPesanan']       = $ps['kd_pesanan'];
                $arrTemp['kdPelanggan']     = $ps['pelanggan'];
                $arrTemp['namaPelanggan']   = $this -> state($this -> su) -> getNamaPelanggan($ps['pelanggan']);
                $arrTemp['tipe']            = $ps['tipe'];
                $arrTemp['jumlahTamu']      = $ps['jumlah_tamu'];
                $arrTemp['waktuMasuk']      = $ps['waktu_masuk'];
                $arrTemp['waktuSelesai']    = $ps['waktu_selesai'];
                $arrTemp['meja']            = $this -> state($this -> su) -> getNamaMeja($ps['meja']);
                $arrTemp['status']          = $ps['status'];
                $arrTemp['operator']        = $ps['operator'];
                $data['pesanan'][]          = $arrTemp;
            }
            $data['status'] = 'success';
        }
        $this -> toJson($data);
    }

    public function detailPesanan($kdPesanan)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['kdPesanan']  = $kdPesanan;
        $data['pesanan']    = $this -> state($this -> sn) -> getPesananData($kdPesanan);
        $this -> bind('dasbor/pesanan/detailPesanan', $data);
    }

    public function detailPesananData()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan                  = $this -> inp('kdPesanan');
        $data['kdPesanan']          = $kdPesanan;
        $pesanan                    = $this -> state($this -> sn) -> getDetailPesanan($kdPesanan);
        $pembayaran                 = $this -> state($this -> sn) -> detailPembayaran($kdPesanan);
        $data['namaPelanggan']      = $this -> state($this -> su) -> getNamaPelanggan($pesanan['pelanggan']);
        $data['kdInvoice']          = $pembayaran['kd_invoice'];
        $data['waktuPembayaran']    = $pembayaran['waktu'];
        $data['tipePesanan']        = $pesanan['tipe'];
        $data['totalPembelian']     = $pembayaran['total'];
        $data['totalHargaPesanan']  = $pembayaran['total'];
        $data['kdPromo']            = $pembayaran['kd_promo'];
        $data['diskon']             = $pembayaran['diskon'];
        $data['tax']                = $pembayaran['tax'];
        $data['totalFinal']         = $pembayaran['total_final'];
        $data['tunai']              = $pembayaran['tunai'];
        $data['kembali']            = $pembayaran['kembali'];
        $data['operator']           = $pembayaran['operator'];
        //get detailPesanan
        $this -> toJson($data);
    }

    public function pesananBaru()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['meja']       = $this -> state($this -> sn) -> getDataMeja();
        $data['pelanggan']  = $this -> state($this -> sn) -> getDataPelanggan();
        $data['kategori']   = $this -> state($this -> sn) -> getDataKategori();
        $this -> bind('dasbor/pesanan/buatPesanan', $data);
    }

    public function getMenuKategori()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdKategori     = $this -> inp('kdMenu');
        $data['menu']   = $this -> state($this -> sn) -> getMenuWithKategori($kdKategori);
        $this -> toJson($data);
    }

    public function buatPesanan()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPelanggan        = $this -> inp('pelanggan');
        $tipe               = $this -> inp('tipe');
        $jlhTamu            = $this -> inp('jlhTamu');
        $kdPesanan          = $this -> rnstr(15);
        $waktuMasuk         = $this -> waktu();
        $operator           = $this -> getses('userSession');
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

    public function buatPesananTakeHome()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPelanggan        = $this -> inp('kdPelanggan');
        $kdPesanan          = $this -> rnstr(15);
        $waktu              = $this -> waktu();
        $operator           = $this -> getses('userSession');
        //buat pesanan 
        $this -> state($this -> sn) -> buatPesananTakeHome($kdPesanan, $kdPelanggan, $waktu, $operator);
        $data['status']     = 'sukses';
        $data['kdPesanan']  = $kdPesanan; 
        $this -> toJson($data);
    }

    public function updatePesanan($kdPesanan)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['kdPesanan'] = $kdPesanan;
        $this -> bind('dasbor/pesanan/updatePesanan', $data);
    }

    public function updateTempPesanan()
    {
        $this -> state($this -> su) -> csrfCek();
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
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan              = $this -> inp('kdPesanan');
        $dp                     = $this -> state($this -> sn) -> getDetailPesanan($kdPesanan);
        $data['jlhTamu']        = $dp['jumlah_tamu'];
        $data['namaPelanggan']  = $this -> state('utilityData') -> getNamaPelanggan($dp['pelanggan']);
        $data['meja']           = $this -> state('utilityData') -> getNamaMeja($dp['meja']);
        $this -> toJson($data);
    }

    public function getTempFirst()
    {
        $this -> state($this -> su) -> csrfCek();
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
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan      = $this -> inp('kdPesanan');
        $this -> state($this -> sn) -> hapusTempLama($kdPesanan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function batalkanPesanan()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan = $this -> inp('kdPesanan');
        //bersihkan temp data 
        $this -> state($this -> sn) -> hapusTempLama($kdPesanan);
        //hapus data pesanan
        $this -> state($this -> sn) -> hapusPesanan($kdPesanan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}