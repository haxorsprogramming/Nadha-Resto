<?php
// BANTUAN ROUTE 
class bantuan extends Route{
    // INISIALISASI STATE
    private $su = 'utilityData';

    public function index()
    {
        $data['bantuan'] = $this -> state($this -> su) -> getBantuan();
        $this -> bind('dasbor/bantuan/bantuan', $data);
    }

}