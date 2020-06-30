<?php

class pembayaran extends Route{

    private $sn = 'pembayaranData';

    public function index()
    {

    }

    public function formPembayaran($kdPesanan)
    {
        echo $kdPesanan;
    }

}
