<?php

class pelanggan extends Route{

    private $sn = 'pelangganData';

    public function index()
    {
      $data['pelanggan'] = $this -> state($this -> sn) -> getPelanggan();
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
      $this -> state($this -> sn) -> tambahPelanggan($idPelanggan, $nama, $alamat, $hp, $email, $visit);
      $data['status'] = 'sukses';
      $this -> toJson($data);
    }

}
