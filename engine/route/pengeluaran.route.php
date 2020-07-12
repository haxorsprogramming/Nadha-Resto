<?php

class pengeluaran extends Route{

    private $sn = 'pengeluaranData';

    public function pembelianBahanBaku()
    {
        $this -> bind('dasbor/pengeluaran/pembelianBahanBaku');
    }

}