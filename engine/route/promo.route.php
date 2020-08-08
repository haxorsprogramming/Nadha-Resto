<?php

class promo extends Route{

    private $sn = 'promoData';
    private $su = 'utilityData';

    public function index()
    {
        $data['promo'] = $this -> state($this -> sn) -> getPromoData();
        $this -> bind('dasbor/promo/promo', $data);
    }

    public function tambahPromo()
    {
        $kdPromo            = $this -> rnint(6);
        $namaPromo          = $_POST['namaPromo'];
        $deks               = $_POST['deks'];
        $tipe               = $_POST['tipe'];
        $nilai              = $_POST['nilai'];
        $kuota              = $_POST['kuota'];
        $tanggalExpired     = $_POST['tanggalExpired'];
        //cek apakah nama promo sudah ada 
        $cekNama            = $this -> state($this -> sn) -> cekNamaPromo($namaPromo);
        if($cekNama < 1){
             $this -> state($this -> sn) -> tambahPromo($kdPromo, $namaPromo, $deks, $tipe, $nilai, $kuota, $tanggalExpired);
            $data['status'] = 'sukses';
        }else{
            $data['status'] = 'error_nama_promo';
        }
        $this -> toJson($data);
    }

    public function detailPromo($kdPromo)
    {
        
    }

}