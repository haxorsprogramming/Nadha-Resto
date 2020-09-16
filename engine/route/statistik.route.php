<?php

class statistik extends Route{

    private $sn = 'statistikData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $bulan              = date('m');
        $data['bulanIndo']  = $this -> bulanIndo($bulan);
        $this -> bind('dasbor/statistik/statistik', $data);
    }

    public function getMenuTerlaris()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['menuData'] = $this -> state($this -> sn) -> getMenuTerlaris();
        $this -> toJson($data);
    }

    public function getPemasukanHarian()
    {
        $this -> state($this -> su) -> csrfCek();
        $tahunNow   = date('Y');
        $bulanNow   = date('m');
        $tHari      =  $this -> ambilHari($bulanNow);

        for ($x = 0; $x < $tHari; $x++){
            $tanggalList = $this -> getTanggalBedaDigit($x + 1);
            $start              = $tahunNow."-".$bulanNow."-".$tanggalList." 00:00:00";
            $finish             = $tahunNow."-".$bulanNow."-".$tanggalList." 23:59:59";
            $nominalTransaksi   = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'masuk');

            if(is_null($nominalTransaksi) == 1){
                $nT = 0;
            }else{
                $nT = $nominalTransaksi;
            }
            
            $arrTemp['tanggal']     = $tanggalList;
            $arrTemp['nilai']       = $nT;
            $data['pemasukan'][]    = $arrTemp;
        }

        $this -> toJson($data);
    }

}