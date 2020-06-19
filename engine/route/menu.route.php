<?php

class menu extends Route{

    public function __construct()
    {
        $this -> st = new state;
    }

    public function index()
    {
        $this -> bind('/dasbor/menu/menu');
    }

    
}