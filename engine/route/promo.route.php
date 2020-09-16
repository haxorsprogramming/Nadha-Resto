<?php

class promo extends Route{

    private $sn = 'promoData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['promo'] = $this -> state($this -> sn) -> getPromoData();
        $this -> bind('dasbor/promo/promo', $data);
    }

    public function tambahPromo()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPromo            = $this -> rnint(6);
        $namaPromo          = $this -> inp('namaPromo');
        $deks               = $this -> inp('deks');
        $tipe               = $this -> inp('tipe');
        $nilai              = $this -> inp('nilai');
        $kuota              = $this -> inp('kuota');
        $tanggalExpired     = $this -> inp('tanggalExpired');
        //cek apakah nama promo sudah ada 
        $cekNama            = $this -> state($this -> sn) -> cekNamaPromo($namaPromo);
        if($cekNama < 1){
            //cek tanggal expired 
            $tanggalNow = $this -> tanggal();
            $cekTanggal = $this -> cekDateCompare($tanggalExpired, $tanggalNow);
            if($cekTanggal === false){
                $data['status'] = 'error_tanggal';
            }else{
                $this -> state($this -> sn) -> tambahPromo($kdPromo, $namaPromo, $deks, $tipe, $nilai, $kuota, $tanggalExpired);
                $data['status'] = 'sukses';
            }           
        }else{
            $data['status'] = 'error_nama_promo';
        }
        $this -> toJson($data);
    }

    public function detailPromo($kdPromo)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['kdPromo']    = $kdPromo;
        $data['tipe']       = array('persen', 'total_harga');
        $data['promo']      = $this -> state($this -> sn) -> detailPromo($kdPromo);
        $this -> bind('dasbor/promo/detailPromo', $data);
    }

    public function update()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPromo        = $this -> inp('kdPromo');
        $nama           = $this -> inp('namaPromo');
        $deks           = $this -> inp('deks');
        $tipe           = $this -> inp('tipe');
        $nilai          = $this -> inp('nilai');
        $kuota          = $this -> inp('kuota');
        $tanggalExpired = $this -> inp('tanggalExpired');
        $tanggalNow     = $this -> tanggal();
        $cekTanggal     = $this -> cekDateCompare($tanggalExpired, $tanggalNow);
        //cek tanggal
        if($cekTanggal === false){
            $data['status'] = 'error_tanggal';
        }else{
            $this -> state($this -> sn) -> updatePromo($kdPromo, $nama, $deks, $tipe, $nilai, $kuota, $tanggalExpired);
            $data['status'] = 'sukses';
        }
        $this -> toJson($data);
    }

    public function delete()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPromo        = $this -> inp('kdPromo');
        $this -> state($this -> sn) -> deletePromo($kdPromo);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}