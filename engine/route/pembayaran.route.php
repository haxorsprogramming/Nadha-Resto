<?php

class pembayaran extends Route{

    private $sn = 'pembayaranData';

    public function index()
    {

    }

    public function formPembayaran($kdPesanan)
    {
        $data['kdPesanan'] = $kdPesanan;
        $this -> bind('dasbor/pembayaran/formPembayaran', $data);
    }

}
 