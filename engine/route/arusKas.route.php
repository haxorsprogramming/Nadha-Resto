<?php
// ARUS KAS ROUTE 
class arusKas extends Route{
    //inisialisasi state
    private $sn = 'arusKasData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/arusKas/arusKas');
    }

    public function getArusKas()
    {
        $requestData = $_REQUEST;
        $totalArusKas = $this -> state($this -> sn) ->  getJlhArusKas();
        
        $arusKasData = $this -> state($this -> sn) ->  getDataArusKas($requestData);
        $data = array();

        foreach($arusKasData as $ak){
            $nestedData = array();
            $nestedData[] = $ak['kd_transaksi'];
            $nestedData[] = $ak['waktu'];
            $nestedData[] = $ak['tipe'];
            $nestedData[] = $ak['arus'];
            $nestedData[] = "Rp.". number_format($ak['total']);
            $nestedData[] = "<a class='btn btn-primary btn-sm' href='#!'>Detail</a>";
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),  
            "recordsTotal"    => intval( $totalArusKas ), 
            "recordsFiltered" => intval( $totalArusKas ), 
            "data"            => $data );

        echo json_encode($json_data);
    }

}