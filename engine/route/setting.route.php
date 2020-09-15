<?php

class setting extends Route{

    private $sn = 'settingData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/setting/setting');
    }

    public function getDataRestoran()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['namaResto']              = $this -> state($this -> sn) -> getSettingData('nama_resto');
        $data['alamatResto']            = $this -> state($this -> sn) -> getSettingData('alamat_resto');
        $data['namaOwner']              = $this -> state($this -> sn) -> getSettingData('nama_owner');
        $data['tax']                    = $this -> state($this -> sn) -> getSettingData('tax');
        $data['ipAddressPrintKasir']    = $this -> state($this -> sn) -> getSettingData('ip_address_print_kasir');
        $data['ipAddressPrintKichen']   = $this -> state($this -> sn) -> getSettingData('ip_address_print_kichen');
        $data['ipAddressPrintOther']    = $this -> state($this -> sn) -> getSettingData('ip_address_print_other');
        $data['emailResto']             = $this -> state($this -> sn) -> getSettingData('email_resto');
        $data['awalPembukuan']          = $this -> state($this -> sn) -> getSettingData('awal_pembukuan');
        $data['apiWooWa']               = $this -> state($this -> sn) -> getSettingData('api_woo_wa');
        $data['saldoAwal']              = $this -> state($this -> sn) -> getSettingData('saldo_awal');
        $data['nomorHandphone']         = $this -> state($this -> sn) -> getSettingData('nomor_handphone');
        $data['koneksiPrinter']         = $this -> state($this -> sn) -> getSettingData('koneksi_printer');
        $data['emailHost']              = $this -> state($this -> sn) -> getSettingData('email_host');
        $data['emailHostPassword']      = $this -> state($this -> sn) -> getSettingData('email_host_password');
        $data['logo']                   = $this -> state($this -> sn) -> getSettingData('logo_resto');
        $data['f_apiKey']               = $this -> state($this -> sn) -> getFirebaseConfig('apiKey');
        $data['f_authDomain']           = $this -> state($this -> sn) -> getFirebaseConfig('authDomain');
        $data['f_databaseURL']          = $this -> state($this -> sn) -> getFirebaseConfig('databaseURL');
        $data['f_projectId']            = $this -> state($this -> sn) -> getFirebaseConfig('projectId');
        $data['f_storageBucket']        = $this -> state($this -> sn) -> getFirebaseConfig('storageBucket');
        $data['f_messagingSenderId']    = $this -> state($this -> sn) -> getFirebaseConfig('messagingSenderId');
        $data['f_appId']                = $this -> state($this -> sn) -> getFirebaseConfig('appId');           
        $this -> toJson($data);
    }
    
    public function updateData()
    {
        $this -> state($this -> su) -> csrfCek();
        $this -> state($this -> sn) -> csrfCek();
        $this -> state($this -> sn) -> updateData('tax', $this -> inp('tax'));
        $this -> state($this -> sn) -> updateData('nama_resto', $this -> inp('namaResto'));
        $this -> state($this -> sn) -> updateData('ip_address_print_kasir', $this -> inp('ipAddressPrintKasir'));
        $this -> state($this -> sn) -> updateData('ip_address_print_kichen', $this -> inp('ipAddressPrintKichen'));
        $this -> state($this -> sn) -> updateData('alamat_resto', $this -> inp('alamatResto'));
        $this -> state($this -> sn) -> updateData('nama_owner', $this -> inp('namaOwner'));
        $this -> state($this -> sn) -> updateData('email_resto', $this -> inp('emailResto'));
        $this -> state($this -> sn) -> updateData('awal_pembukuan', $this -> inp('awalPembukuan'));
        $this -> state($this -> sn) -> updateData('api_woo_wa', $this -> inp('apiWooWa'));
        $this -> state($this -> sn) -> updateData('saldo_awal', $this -> inp('saldoAwal'));
        $this -> state($this -> sn) -> updateData('nomor_handphone', $this -> inp('nomorHandphone'));
        $this -> state($this -> sn) -> updateData('koneksi_printer', $this -> inp('koneksiPrinter'));
        $this -> state($this -> sn) -> updateData('ip_address_print_other', $this -> inp('ipAddressPrintOther'));
        $this -> state($this -> sn) -> updateData('email_host', $this -> inp('emailHost'));
        $this -> state($this -> sn) -> updateData('email_host_password', $this -> inp('emailHostPassword'));
        $dr['status'] = 'sukses';
        $this -> toJson($dr);
    }

}