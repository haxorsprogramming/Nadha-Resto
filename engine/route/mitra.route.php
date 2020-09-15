<?php

class mitra extends Route{
    
    private $sn = 'mitraData';
    private $su = 'utilityData';
    
    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['mitra'] = $this -> state($this -> sn) -> getMitra();
        $this -> bind('dasbor/mitra/mitra', $data);
    }

    public function detailMitra($kdMitra)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['kdMitra'] = $kdMitra;
        $data['mitra'] = $this -> state($this -> sn) -> detailMitra($kdMitra);
        $data['historiTransaksi'] = $this -> state($this -> sn) -> historiTransaksi($kdMitra);
        $this -> bind('dasbor/mitra/detailMitra', $data);
    }

    public function tambahMitra()
    {
        $this -> state($this -> su) -> csrfCek();
        $nama       = $this -> inp('nama');
        $deks       = $this -> inp('deks');
        $pemilik    = $this -> inp('pemilik');
        $alamat     = $this -> inp('alamat');
        $hp         = $this -> inp('hp');
        $tipe       = $this -> inp('tipe');
        $kdMitra    = $this -> rnint(8);
        $cm         = $this -> state($this -> sn) -> cekMitra($nama, $hp);
        if($cm == true){
            $this -> state($this -> sn) -> tambahMitra($kdMitra, $nama, $deks, $alamat, $pemilik, $hp, $tipe);
            $data['status'] = 'sukses';
        }else{
            $data['status'] = 'error';
        }
        $this -> toJson($data);
    }

    public function updateMitra()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdMitra = $this -> inp('kdMitra');
        $nama = $this -> inp('nama');
        $deks = $this -> inp('deks');
        $alamat = $this -> inp('alamat');
        $pemilik = $this -> inp('pemilik');
        $noHp = $this -> inp('noHp');
        $this -> state($this -> sn) -> updateMitra($nama, $deks, $alamat, $pemilik, $noHp, $kdMitra);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function deleteMitra()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdMitra = $this -> inp('kdMitra');
        $this -> state($this -> sn) -> deleteMitra($kdMitra);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }
    
}