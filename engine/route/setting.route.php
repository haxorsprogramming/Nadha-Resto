<?php

class setting extends Route{

    private $sn = 'settingData';

    public function index()
    {
        $this -> bind('dasbor/setting/setting');
    }

    public function getDataRestoran()
    {
        $data['namaResto']              = $this -> state($this -> sn) -> getSettingData('nama_resto');
        $data['alamatResto']            = $this -> state($this -> sn) -> getSettingData('alamat_resto');
        $data['namaOwner']              = $this -> state($this -> sn) -> getSettingData('nama_owner');
        $data['tax']                    = $this -> state($this -> sn) -> getSettingData('tax');
        $data['ipAddressPrintKasir']    = $this -> state($this -> sn) -> getSettingData('ip_address_print_kasir');
        $data['ipAddressPrintKichen']   = $this -> state($this -> sn) -> getSettingData('ip_address_print_kichen');
        $data['ipAddressPrintOther']    = $this -> state($this -> sn) -> getSettingData('ip_address_print_other');
        $data['emailResto']             = $this -> state($this -> sn) -> getSettingData('email_resto');
        $data['awalPembukuan']          = $this -> state($this -> sn) -> getSettingData('awal_pembukuan');
        $data['apiWaResponder']         = $this -> state($this -> sn) -> getSettingData('api_wa_responder');
        $data['saldoAwal']              = $this -> state($this -> sn) -> getSettingData('saldo_awal');
        $data['nomorHandphone']         = $this -> state($this -> sn) -> getSettingData('nomor_handphone');
        $data['koneksiPrinter']         = $this -> state($this -> sn) -> getSettingData('koneksi_printer');
        $data['emailHost']              = $this -> state($this -> sn) -> getSettingData('email_host');
        $data['emailHostPassword']      = $this -> state($this -> sn) -> getSettingData('email_host_password');
        $data['logo']                   = $this -> state($this -> sn) -> getSettingData('logo_resto');                         
        $this -> toJson($data);
    }
    

    public function updateData()
    {
        // 'namaResto' : this.namaResto, 'alamatResto' : this.alamatResto, 'namaOwner' : this.namaResto,
                    // 'tax' : this.tax, 'ipAddressPrintKasir' : this.ipAddressPrintKasir, 'ipAddressPrintKichen' : this.ipAddressPrintKichen,
                    // 'ipAddressPrintOther' : this.ipAddressPrintOther, 'emailResto' : this.emailResto, 'awalPembukuan' : this.awalPembukuan, 
                    // 'apiWaResponder': this.apiWaResponder,
                    // 'saldoAwal' : this.saldoAwal, 'nomorHandphone' : this.nomorHandphone, 'koneksiPrinter' : this.koneksiPrinter, 'emailHost' : this.emailHost, 
                    // 'emailHostPassword' : this.emailHostPassword
        // $data['namaResto'] = $this -> inp('namaResto');
        // $data['alamatResto'] = $this -> inp('alamatResto');
        // $data['namaOwner'] = $this -> inp('namaOwner');
        // $data['tax'] = $this -> inp('tax');
        // $data['ipAddressPrintKasir'] = $this -> inp('ipAddressPrintKasir');
        // $data['ipAddressPrintKichen'] = $this -> inp('ipAddressPrintKichen');
        // $data['ipAddressPrintOther'] = $this -> inp('ipAddressPrintOther');
        // $data['emailResto'] = $this -> inp('emailResto');
        // $data['awalPembukuan'] = $this -> inp('awalPembukuan');
        // $data['saldoAwal'] = $this -> inp('saldoAwal');
        // $data['nomorHandphone'] = $this -> inp('nomorHandphone');
        // $data['koneksiPrinter'] = $this -> inp('koneksiPrinter');
        // $data['emailHost'] = $this -> inp('emailHost');
        // $data['emailHostPassword'] = $this -> inp('emailHostPassword');
        $this -> state($this -> sn) -> updateData('tax', $this -> inp('tax'));
        $this -> state($this -> sn) -> updateData('nama_resto', $this -> inp('namaResto'));
        $this -> state($this -> sn) -> updateData('ip_address_print_kasir', $this -> inp('ipAddressPrintKasir'));
        $this -> state($this -> sn) -> updateData('ip_address_print_kichen', $this -> inp('ipAddressPrintKichen'));
        $this -> state($this -> sn) -> updateData('alamat_resto', $this -> inp('alamatResto'));
        $this -> state($this -> sn) -> updateData('nama_owner', $this -> inp('namaOwner'));
        $this -> state($this -> sn) -> updateData('email_resto', $this -> inp('emailResto'));
        $this -> state($this -> sn) -> updateData('awal_pembukuan', $this -> inp('awalPembukuan'));
        $this -> state($this -> sn) -> updateData('api_wa_responder', $this -> inp('apiWaResponder'));
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