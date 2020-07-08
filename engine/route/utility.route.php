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
      $kdKategori = $this -> inp('kdKategori');
      $data['menu'] = $this -> state($this -> sn) -> getDataMenuKategori($kdKategori);
      $this -> toJson($data);
    }
    
}