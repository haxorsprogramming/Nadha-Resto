<?php

class pelanggan extends Route{

    private $sn = 'pelangganData';
    private $su = 'utilityData';

    public function index($page)
    {
      $jlhPelanggan = $this -> state($this -> sn) -> getJlhPelanggan();
      $jlhPaginasi = $jlhPelanggan / 10;
      $data['pelanggan'] = $this -> state($this -> sn) -> getPelanggan($page);
      $data['jlhPelanggan'] = $jlhPelanggan;
      $data['jlhPaginasi'] = $jlhPaginasi;
      $data['pageNow'] = $page;
      $this -> bind('dasbor/pelanggan/pelanggan', $data);
    }

    public function getDataPelanggan($page)
    {
      $data['pelanggan'] = $this -> state($this -> sn) -> getPelanggan($page);
      $this -> toJson($data);
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
