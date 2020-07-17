<?php

class home extends Route{

    private $sn = 'homeData';
    private $su = 'utilityData';

    public function index()
    {   
        $data['namaResto'] = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $data['dataSlider'] = $this -> state($this -> sn) -> getDataSlider();
        $data['dataMenu'] = $this -> state($this -> sn) -> getDataMenu();  
        $this -> bind('/home/home', $data);   
    }

    public function selfservice()
    {
        $this -> bind('/home/selfService');
    }

}