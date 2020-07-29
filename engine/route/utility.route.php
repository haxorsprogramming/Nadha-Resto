<?php

class utility extends Route{

    private $sn = 'utilityData';

    public function getDataMenu()
    {
      $data['menu'] = $this -> state($this -> sn) -> getDataMenu();
      $this -> toJson($data);
    }
    
    public function getDataKategori()
    {
      $data['kategori'] = $this -> state($this -> sn) -> getDataKategori();
      $this -> toJson($data);
    }

    public function getDataMenuKategori()
    {
      $kdKategori     = $this -> inp('kdKategori');
      $data['menu']   = $this -> state($this -> sn) -> getDataMenuKategori($kdKategori);
      $this -> toJson($data);
    }

    public function getFirebaseSetting()
    {
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