<?php

class pengeluaran extends Route{

    private $sn = 'pengeluaranData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/pengeluaran/pengeluaran');
    }

}