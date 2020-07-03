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
        $qTemp = $this -> state($this -> sn) -> getDataTempPesanan($kdPesanan);
        foreach($qTemp as $qt){
            $kdMenu = $qt['kd_menu'];
            //cari nama lewat kode menu
            $namaMenu = $this -> state($this -> sn) ->  getCapMenuName($kdMenu);
            $arrTemp['namaMenu'] = $namaMenu;
            $data['tempPesanan'] = $arrTemp;
        }
        $data['status'] = '200';
        $this -> toJson($data);
    }

}
 