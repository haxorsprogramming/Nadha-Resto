<?php

class home extends Route{

    private $sn = 'homeData';
    private $su = 'utilityData';

    public function index()
    {   
        $data['namaResto']  = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $data['dataSlider'] = $this -> state($this -> sn) -> getDataSlider();
        $data['dataMenu']   = $this -> state($this -> sn) -> getDataMenu();  
        $this -> bind('/home/home', $data);   
    }

    public function selfservice()
    {
        $data['namaResto'] = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $data['kategoriMenu'] = $this -> state($this -> sn) -> getKategoriMenu();
        $data['promo'] = $this -> state($this -> sn) -> getPromo();
        $this -> bind('/home/selfService', $data);
    }

    public function getKdTemp()
    {
        $data['kdTemp'] = $this -> rnstr(20);
        $this -> toJson($data);
    }

    public function saveTemp()
    {
        // {'kdMenu':kdMenu, 'hargaAt':hargaAt, 'qt':qt, 'total':total, 'kdTemp':kdTemp}
        $kdTemp = $this -> inp('kdTemp');
        $kdMenu = $this -> inp('kdMenu');
        $hargaAt = $this -> inp('hargaAt');
        $qt = $this -> inp('qt');
        $total = $this -> inp('total');
        $this -> state($this -> sn) -> saveTemp($kdTemp, $kdMenu, $qt, $hargaAt, $total);
        $data['status'] = 'sukses';
        $this -> setses('cartLess', TRUE);
        $this -> setses('cartLessKd', $kdTemp);
        $this -> toJson($data);
    }

    public function checkOut($kdTemp)
    {
        $this -> bind('/home/checkout');
    }

}