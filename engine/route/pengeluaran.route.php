<?php

class pengeluaran extends Route{

    private $sn = 'pengeluaranData';

    public function pembelianBahanBaku()
    {
        $this -> bind('dasbor/pengeluaran/pembelianBahanBaku');
    }

    public function getDataBahanBaku()
    {
        $data['bahanBaku'] = $this -> state($this -> sn) -> getDataBahanBaku();
        $this -> toJson($data);
    }

}