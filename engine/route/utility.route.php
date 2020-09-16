<?php

class utility extends Route{

    private $sn = 'utilityData';

    public function getDataMenu()
    {
      $this -> state($this -> sn) -> csrfCek();
      $data['menu'] = $this -> state($this -> sn) -> getDataMenu();
      $this -> toJson($data);
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
      $data['apiKey']             = $this -> state($this -> sn) -> getFirebaseSetting('apiKey');
      $data['authDomain']         = $this -> state($this -> sn) -> getFirebaseSetting('authDomain');
      $data['databaseURL']        = $this -> state($this -> sn) -> getFirebaseSetting('databaseURL');
      $data['projectId']          = $this -> state($this -> sn) -> getFirebaseSetting('projectId');
      $data['storageBucket']      = $this -> state($this -> sn) -> getFirebaseSetting('storageBucket');
      $data['messagingSenderId']  = $this -> state($this -> sn) -> getFirebaseSetting('messagingSenderId');
      $data['appId']              = $this -> state($this -> sn) -> getFirebaseSetting('appId');
      $this -> toJson($data);
    }

    public function getWorkers()
    {
        $waktu = $this -> waktu();
         // nama laundry
         $data['namaLaundry']       = $this -> state($this -> sn) -> getSettingResto('laundry_name');
         //alamat
         $data['alamatLaundry']     = $this -> state($this -> sn) -> getSettingResto('address');
         //kota 
         $data['kotaLaundry']       = $this -> state($this -> sn) -> getSettingResto('kota');
         //kabupaten 
         $data['kabupatenLaundry']  = $this -> state($this -> sn) -> getSettingResto('kabupaten');
         //provinsi 
         $data['provinsiLaundry']   = $this -> state($this -> sn) -> getSettingResto('provinsi');
         //email
         $data['email']             = $this -> state($this -> sn) -> getSettingResto('email');
         //hp 
         $hp = $this -> state($this -> sn) -> getLaundryData('hp');
         $data['hp']                = $hp;
         $this -> toJson($data);
    }

    
}