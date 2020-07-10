<?php

class dasbor extends Route{

    public function __construct()
    {
        $this -> st = new state;
    }

    public function index()
    {     
        $this -> bind('/dasbor/index');   
    }

    public function beranda()
    {
        $data['jlhPengunjung'] = $this -> state('utilityData') -> getJlhPengunjung();
        $data['jlhPelanggan'] = $this -> state('utilityData') -> getJlhPelanggan();
        $this -> bind('/dasbor/beranda', $data);   
    }

    public function getMenuTerlaris()
    {
        $data['menuTerlaris'] = $this -> state('utilityData') -> getMenuTerlaris();
        $this -> toJson($data);
    }

    public function getTransaksiTerakhir()
    {
        $data['lt'] = $this -> state('utilityData') -> getTransaksiTerakhir();
        $this -> toJson($data);
    }

    public function logOut()
    {
        $this -> destses();
        $this -> goto(HOMEBASE.'login');
    }

}