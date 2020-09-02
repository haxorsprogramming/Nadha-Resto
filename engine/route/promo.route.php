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
        $data['kdPromo'] = $kdPromo;
        $data['tipe'] = array('persen', 'total_harga');
        $data['promo'] = $this -> state($this -> sn) -> detailPromo($kdPromo);
        $this -> bind('dasbor/promo/detailPromo', $data);
    }

    public function update()
    {
        // {'kdPromo':kdPromo, 'namaPromo':namaPromo, 'deks':deks, 'tipe':tipe, 'nilai':nilai, 'kuota':kuota, 'tanggalExpired':tanggalExpired}
        $kdPromo = $this -> inp('kdPromo');
        $nama = $this -> inp('namaPromo');
        $deks = $this -> inp('deks');
        $tipe = $this -> inp('tipe');
        $nilai = $this -> inp('nilai');
        $kuota = $this -> inp('kuota');
        $tanggalExpired = $this -> inp('tanggalExpired');
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}