<?php

class laporan extends Route{

    private $su = 'utilityData';

    public function index()
    {     
        $this -> bind('/home/home');   
    }

}