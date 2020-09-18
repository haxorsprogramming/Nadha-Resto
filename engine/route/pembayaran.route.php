<?php

class pembayaran extends Route{

    private $sn = 'pembayaranData';
    private $su = 'utilityData';
    
    public function index()
    {
        echo "<pre>Meaowww...</pre>";
    }

    public function formPembayaran($kdPesanan)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['kdPesanan'] = $kdPesanan;
        $this -> bind('dasbor/pembayaran/formPembayaran', $data);
    }

    public function getDataPesanan()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan              = $this -> inp('kdPesanan');
        $kdCaps                 = strtoupper($kdPesanan);
        //buat invoice 
        $kdInvoice              = date('m')."-".date('d')."-".date('Y')."-".substr($kdCaps, 0, 4);
        $data['kdInvoice']      = $kdInvoice;
        $data['detailPesanan']  = $this -> state($this -> sn) -> getPesananDetails($kdPesanan);
        $kdPelanggan            = $data['detailPesanan']['pelanggan'];
        $data['tipePesanan']    = $data['detailPesanan']['tipe'];
        //cari meja
        $kdMeja                 = $data['detailPesanan']['meja'];
        $data['namaMeja']       = $this -> state($this -> sn) -> getCapMeja($kdMeja);
        $data['namaPelanggan']  = $this -> state($this -> sn) -> getNamaPelanggan($kdPelanggan);
        //data tax 
        $data['tax']            = $this -> state($this -> sn) -> getTax();
        $qTemp                  = $this -> state($this -> sn) -> getDataTempPesanan($kdPesanan);
        $totalHarga             = 0;
        foreach($qTemp as $qt){
            $kdMenu                 = $qt['kd_menu'];
            //cari nama lewat kode menu
            $qMenu                  = $this -> state($this -> sn) ->  getCapMenuName($kdMenu);
            $arrTemp['namaMenu']    = $qMenu['nama'];
            $arrTemp['satuan']      = $qMenu['satuan'];
            $arrTemp['hargaAt']     = $qt['harga_at'];
            $arrTemp['qt']          = $qt['qt'];
            $arrTemp['total']       = $qt['total'];
            $totalHarga             = $totalHarga + $qt['total'];
            $arrTemp['kdMenu']      = $kdMenu;
            $data['tempPesanan'][]  = $arrTemp;
        }
        $data['totalHarga'] = $totalHarga;
        $data['status'] = '200';
        $this -> toJson($data);
    }

    public function cekPromo()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPromo    = $this -> inp('kdPromo');
        $tglNow     = date('d-m-Y');
        $promoCek   = $this -> state($this -> sn) -> cekPromoValid($kdPromo);

        if($promoCek === false){
            $dataPromo  = $this -> state($this -> sn) -> getDataPromo($kdPromo);
            $tglExpired = $dataPromo['tanggal_expired'];
            $tbb        = explode("-", $tglExpired);
            $tglAff     = $tbb[2]."-".$tbb[1]."-".$tbb[0];
            $selisih    = $this -> cekDateCompare($tglAff, $tglNow);

            if($selisih === false){
                $data['status'] = 'error_promo_code';
            }else{
                $data['value']  = $dataPromo['value'];
                $data['tipe']   = $dataPromo['tipe'];
                $data['status'] = 'next';
            }
            
        }else{
            $data['status'] = 'error_promo_code';
        }
        // $data['status'] = $promoCek;
        $this -> toJson($data);
    }

    public function prosesPembayaran()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdInvoice  = $this -> inp('kdInvoice');
        $kdPesanan  = $this -> inp('kdPesanan');
        $totalHarga = $this -> inp('totalHarga');
        $kdPromo    = $this -> inp('kdPromo');
        $diskon     = $this -> inp('diskon');
        $tax        = $this -> inp('tax');
        $totalFinal = $this -> inp('totalFinal');
        $tunai      = $this -> inp('tunai');
        $kembali    = $this -> inp('kembali');
        $operator   = $this -> getses('userSession');
        $waktu      = $this -> waktu();
        $meja       = $this -> inp('meja');
        //simpan data pembayaran
        $this -> state($this -> sn) -> prosesPembayaran($kdInvoice, $kdPesanan, $waktu, $totalHarga, $kdPromo, $diskon, $tax, $totalFinal, $tunai, $kembali, $operator);
        //update status pembayaran
        $this -> state($this -> sn) -> updateStatusPembayaran($kdPesanan, $waktu);
        //update kuota promo 
        $this -> state($this -> sn) -> updateKuotaPromo($kdPromo);
        //update menu total dipesan
        $this -> state($this -> sn) -> updateTotalDipesan($kdPesanan);
         //simpan ke arus kas
         $this -> state($this -> su) -> simpanArusKas($kdPesanan, 'Pembayaran kasir', 'masuk', $totalFinal, $waktu, $operator);
        //cetak struk 
        //update tbl transaksi
        $tokenTransaksi = $this -> rnstr(25);
        $arus = 'masuk';
        $this -> state($this -> sn) -> updateTransaksi($tokenTransaksi, $kdPesanan, $arus, $totalFinal, $waktu, $operator);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function kosongkanMeja()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdMeja = $this -> inp('meja');
        $this -> state($this -> sn) -> kosongkanMeja($kdMeja);
        $this -> state($this -> sn) -> updateMeja($kdMeja);
    }

}
 