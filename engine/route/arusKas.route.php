<?php

class arusKas extends Route{

    private $sn = 'arusKasData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $this -> bind('dasbor/arusKas/arusKas');
    }

    public function getArusKas()
    {
        $this -> state($this -> su) -> csrfCek();
        $requestData    = $_REQUEST;
        $totalArusKas   = $this -> state($this -> sn) ->  getJlhArusKas();
        $arusKasData    = $this -> state($this -> sn) ->  getDataArusKas($requestData);
        $data           = array();

        foreach($arusKasData as $ak){
            $nestedData     = array();
            $nestedData[]   = $ak['kd_transaksi'];
            $nestedData[]   = $ak['waktu'];
            $nestedData[]   = $ak['tipe'];
            $nestedData[]   = $ak['arus'];
            $nestedData[]   = "Rp.". number_format($ak['total']);
            $nestedData[]   = '<a class="btn btn-primary btn-sm btnDetail" href="#!" data-id="'.$ak['kd_transaksi'].'"><i class="fas fa-info-circle"></i> Detail</a>';
            $data[]         = $nestedData;
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),  
            "recordsTotal"    => intval( $totalArusKas ), 
            "recordsFiltered" => intval( $totalArusKas ), 
            "data"            => $data );

        echo json_encode($json_data);
    }

    public function detailArusKas($kdTransaksi)
    {
        $this -> state($this -> su) -> csrfCek();
        // Cek tipe arus kas   
        $tipeArus = $this -> state($this -> sn) -> cekTipeArus($kdTransaksi);

        if($tipeArus === 'Pembelian bahan baku resto'){
            $data['kdPembelian'] = $kdTransaksi;
            $this -> bind('dasbor/pembelianBahanBaku/detailPembelianBahanBaku', $data);
        }elseif($tipeArus === 'Pengeluaran resto'){
            $data['pengeluaran'] = $this -> state('pengeluaranData') -> getDetailPengeluaran($kdTransaksi);
            $data['kdTransaksi'] = $kdTransaksi;
            $this -> bind('dasbor/pengeluaran/detailPengeluaran', $data);
        }elseif($tipeArus === 'Pembayaran kasir'){
            $data['kdPesanan']  = $kdTransaksi;
            $data['pesanan']    = $this -> state('pesananData') -> getPesananData($kdTransaksi);
            $this -> bind('dasbor/pesanan/detailPesanan', $data);
        }elseif($tipeArus === 'Pembayaran kasir (Delivery Order)'){
            echo "Silahkan cek di menu delivery order";
        }

    }

}