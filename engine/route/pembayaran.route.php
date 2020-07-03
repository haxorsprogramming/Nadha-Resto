<?php

class pembayaran extends Route{

    private $sn = 'pembayaranData';

    public function index()
    {
        echo "<pre>Meaowwww</pre>";
    }

    public function formPembayaran($kdPesanan)
    {
        //buat invoice
        $data['kdPesanan'] = $kdPesanan;
        $this -> bind('dasbor/pembayaran/formPembayaran', $data);
    }

    public function getDataPesanan()
    {
        $kdPesanan = $this -> inp('kdPesanan');
        $kdCaps = strtoupper($kdPesanan);
        //buat invoice 
        $kdInvoice = date('m')."-".date('d')."-".date('Y')."-".substr($kdCaps, 0, 4);
        $data['kdInvoice'] = $kdInvoice;
        $data['detailPesanan'] = $this -> state($this -> sn) -> getPesananDetails($kdPesanan);
        $kdPelanggan = $data['detailPesanan']['pelanggan'];
        $data['namaPelanggan'] = $this -> state($this -> sn) -> getNamaPelanggan($kdPelanggan);
        $qTemp = $this -> state($this -> sn) -> getDataTempPesanan($kdPesanan);
        $totalHarga = 0;
        foreach($qTemp as $qt){
            $kdMenu = $qt['kd_menu'];
            //cari nama lewat kode menu
            $qMenu = $this -> state($this -> sn) ->  getCapMenuName($kdMenu);
            $arrTemp['namaMenu'] = $qMenu['nama'];
            $arrTemp['satuan'] = $qMenu['satuan'];
            $arrTemp['hargaAt'] = $qt['harga_at'];
            $arrTemp['qt'] = $qt['qt'];
            $arrTemp['total'] = $qt['total'];
            $totalHarga = $totalHarga + $qt['total'];
            $arrTemp['kdMenu'] = $kdMenu;
            $data['tempPesanan'][] = $arrTemp;
        }
        $data['totalHarga'] = $totalHarga;
        $data['status'] = '200';
        $this -> toJson($data);
    }

}
 