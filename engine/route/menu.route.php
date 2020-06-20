<?php

class menu extends Route{

    private $sn = 'menuData';

    public function index()
    {
        $data['menu'] = $this -> state($this -> sn) -> getMenu(); 
        $this -> bind('/dasbor/menu/menu', $data);
    }

    public function tambahMenu()
    {
        $this -> bind('/dasbor/menu/formTambahMenu');
    }

}