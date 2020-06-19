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
        $this -> bind('/dasbor/beranda');   
    }

    public function logOut()
    {
        $this -> destses();
        $this -> goto(HOMEBASE.'login');
    }

}