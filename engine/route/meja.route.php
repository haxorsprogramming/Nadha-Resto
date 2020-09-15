<?php

class meja extends Route{

    private $sn = 'mejaData';
    private $su = 'utilityData';
    
    public function index()
    {   $data['meja'] = $this -> state($this -> sn) -> getDataMeja();     
        $this -> bind('dasbor/meja/meja', $data);
    }

    public function prosesTambahMeja()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdMeja     = $this -> rnint(4);
        $nama       = $this -> inp('namaMeja');
        $deks       = $this -> inp('deks');
        $waktu      = $this -> waktu();
        //cek apakah nama meja sudah ada
        $jlhMeja    = $this -> state($this -> sn) -> cekMeja($nama);
        if($jlhMeja < 1){
            $data['status'] = 'sukses';
            $this -> state($this -> sn) -> tambahMeja($kdMeja, $nama, $deks, $waktu); 
        }else{
            $data['status'] = 'meja_name_error';
        }
        $this -> toJson($data);
    }

    public function hapusMeja()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdMeja = $this -> inp('kdMeja');
        $this -> state($this -> sn) -> hapusMeja($kdMeja);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}