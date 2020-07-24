<?php

class pelanggan extends Route{

    private $sn = 'pelangganData';
    private $su = 'utilityData';

    public function index()
    {
      $jlhPelanggan = $this -> state($this -> sn) -> getJlhPelanggan();
      $data['pelanggan'] = $this -> state($this -> sn) -> getPelanggan();
      $data['jlhPelanggan'] = $jlhPelanggan;
      $this -> bind('dasbor/pelanggan/pelanggan', $data);
    }

    public function prosesTambahPelanggan()
    {
      $nama           = $this -> inp('nama');
      $alamat         = $this -> inp('alamat');
      $email          = $this -> inp('email');
      $hp             = $this -> inp('hp');
      $visit          = $this -> waktu();
      $idPelanggan    = $this -> rnint(8);
      //cek apakah ada nomor handphone & nama yang sama
      $jlhPelanggan   = $this -> state($this -> sn) -> getNamaHandphone($nama, $hp);
      if($jlhPelanggan > 0){
        $data['status'] = 'error';
      }else{
        $this -> state($this -> sn) -> tambahPelanggan($idPelanggan, $nama, $alamat, $hp, $email, $visit);
        $data['status'] = 'sukses';
      }
      $this -> toJson($data);
    }

   

}
