<?php

class meja extends Route{

    private $sn = 'mejaData';

    public function index()
    {       
        $this -> bind('dasbor/meja/meja');
    }

}