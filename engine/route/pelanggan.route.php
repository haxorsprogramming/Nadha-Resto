<?php

class pelanggan extends Route{

    private $sn = 'pelangganData';
    private $su = 'utilityData';

    public function index($page)
    {
      $jlhPelanggan = $this -> state($this -> sn) -> getJlhPelanggan();
      $jlhPaginasi = ceil($jlhPelanggan / 10);
      $data['pelanggan'] = $this -> state($this -> sn) -> getPelanggan($page);
      $data['jlhPelanggan'] = $jlhPelanggan;
      $data['jlhPaginasi'] = $jlhPaginasi;
      $data['pageNow'] = $page;
      $this -> bind('dasbor/pelanggan/pelanggan', $data);
    }

    public function getDataPelanggan($page)
    {
      $qPelanggan = $this -> state($this -> sn) -> getPelanggan($page);
      //cek jumlah data
      $jlhPelanggan = $this -> state($this -> sn) -> cekJumlahPelanggan($page);
      if($jlhPelanggan > 0){
        foreach($qPelanggan as $pel){
          $arrTemp['nama'] = $pel['nama'];
          $arrTemp['alamat'] = $pel['alamat'];
          $arrTemp['no_hp'] = $pel['no_hp'];
          $arrTemp['last_visit'] = $pel['last_visit'];
          $arrTemp['id_pelanggan'] = $pel['id_pelanggan'];
          $arrTemp['total_transaksi'] = $this -> state($this -> sn) -> totalTransaksi($pel['id_pelanggan']);
          $data['pelanggan'][] = $arrTemp;
        }
        $data['status'] = 'success';
      }else{
        $data['status'] = 'no_data';
      }
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
