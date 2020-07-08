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
    
}