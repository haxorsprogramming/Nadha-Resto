<?php

class utility extends Route{

    private $sn = 'utilityData';

    public function getDataMenu()
    {
      $this -> state($this -> sn) -> csrfCek();
      $data['menu'] = $this -> state($this -> sn) -> getDataMenu();
      $this -> toJson($data);
    }
    
    public function tesEmail()
    {
      $nama = 'Aditia';
      $penerima = 'alditha.forum@gmail.com';
      $judul = 'Tes kirim email dari google';
      $isi = 'Tes kirim email 3';
      $emailHost = 'dindananinda@gmail.com';
      $passwordHost = '3ncoding4sc11A@';
      $this -> kirimEmail($nama, $penerima, $judul, $isi, $emailHost, $passwordHost);
    }

    public function getDataKategori()
    {
      $this -> state($this -> sn) -> csrfCek();
      $data['kategori'] = $this -> state($this -> sn) -> getDataKategori();
      $this -> toJson($data);
    }

    public function getDataMenuKategori()
    {
      $this -> state($this -> sn) -> csrfCek();
      $kdKategori     = $this -> inp('kdKategori');
      $data['menu']   = $this -> state($this -> sn) -> getDataMenuKategori($kdKategori);
      $this -> toJson($data);
    }

    public function getFirebaseSetting()
    {
      $this -> state($this -> sn) -> csrfCek();
      $data['apiKey'] = $this -> state($this -> sn) -> getFirebaseSetting('apiKey');
      $data['authDomain'] = $this -> state($this -> sn) -> getFirebaseSetting('authDomain');
      $data['databaseURL'] = $this -> state($this -> sn) -> getFirebaseSetting('databaseURL');
      $data['projectId'] = $this -> state($this -> sn) -> getFirebaseSetting('projectId');
      $data['storageBucket'] = $this -> state($this -> sn) -> getFirebaseSetting('storageBucket');
      $data['messagingSenderId'] = $this -> state($this -> sn) -> getFirebaseSetting('messagingSenderId');
      $data['appId'] = $this -> state($this -> sn) -> getFirebaseSetting('appId');
      $this -> toJson($data);
    }
    
}