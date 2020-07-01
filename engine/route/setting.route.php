<?php

class setting extends Route{

    private $sn = 'settingData';

    public function index()
    {
        $this -> bind('dasbor/setting/setting');
    }

    public function getDataRestoran()
    {
        $data['namaResto'] = $this -> state($this -> sn) -> getSettingData('nama_resto');
        $data['alamatResto'] = $this -> state($this -> sn) -> getSettingData('alamat_resto');
        $data['namaOwner'] = $this -> state($this -> sn) -> getSettingData('nama_owner');
        $data['tax'] = $this -> state($this -> sn) -> getSettingData('tax');
        $data['ipAddressPrintKasir'] = $this -> state($this -> sn) -> getSettingData('ip_address_print_kasir');
        $data['ipAddressPrintKichen'] = $this -> state($this -> sn) -> getSettingData('ip_address_print_kichen');
        $data['ipAddressPrintOther'] = $this -> state($this -> sn) -> getSettingData('ip_address_print_other');
        $data['logoResto'] = $this -> state($this -> sn) -> getSettingData('logo_resto');
        $data['emailResto'] = $this -> state($this -> sn) -> getSettingData('email_resto');
        $data['awalPembukuan'] = $this -> state($this -> sn) -> getSettingData('awal_pembukuan');
        $data['apiWaResponder'] = $this -> state($this -> sn) -> getSettingData('api_wa_responder');
        $data['saldoAwal'] = $this -> state($this -> sn) -> getSettingData('saldo_awal');
        $data['nomorHandphone'] = $this -> state($this -> sn) -> getSettingData('nomor_handphone');
        $data['koneksiPrinter'] = $this -> state($this -> sn) -> getSettingData('koneksi_printer');
        $data['emailHost'] = $this -> state($this -> sn) -> getSettingData('email_host');
        $data['emailHostPassword'] = $this -> state($this -> sn) -> getSettingData('email_host_password');
        $this -> toJson($data);
    }

}