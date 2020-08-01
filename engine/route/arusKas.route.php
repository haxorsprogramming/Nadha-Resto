<?php

class arusKas extends Route{
    //inisialisasi state
    private $sn = 'arusKasData';
    private $su = 'utilityData';

    public function index($page)
    {
        $jlhArusKas = $this -> state($this -> sn) ->  getJlhArusKas();
        $jlhPaginasi = ceil($jlhArusKas / 10);
        $data['arusKas'] = '';
        $this -> bind('dasbor/arusKas/arusKas');
    }

}