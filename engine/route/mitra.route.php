<?php

class mitra extends Route{
    // STATE 
    private $sn = 'mitraData';
    private $su = 'utilityData';
    
    public function index()
    {
        $data['mitra'] = $this -> state($this -> sn) -> getMitra();
        $this -> bind('dasbor/mitra/mitra', $data);
    }

    public function detailMitra($kdMitra)
    {
        $data['kdMitra'] = $kdMitra;
        $data['mitra'] = $this -> state($this -> sn) -> detailMitra($kdMitra);
        $this -> bind('dasbor/mitra/detailMitra', $data);
    }

    public function tambahMitra()
    {
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

    
}