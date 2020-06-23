<?php

class pelanggan extends Route{

    private $sn = 'pelangganData';

    public function index()
    {
      $data['pelanggan'] = $this -> state($this -> sn) -> getPelanggan();
      $this -> bind('dasbor/pelanggan/pelanggan', $data);
    }

}
