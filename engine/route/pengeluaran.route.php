<?php

class pengeluaran extends Route{
    
    private $sn = 'pengeluaranData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $this -> bind('dasbor/pengeluaran/pengeluaran');
    }

    public function getDataPengeluaran()
    {
        $this -> state($this -> su) -> csrfCek();
        $requestData = $_REQUEST;
        $totalPengeluaran = $this -> state($this -> sn) ->  totalPengeluaran();
        $dataPengeluaran = $this -> state($this -> sn) -> getDataPengeluaran($requestData);
        $data = array();

        foreach($dataPengeluaran as $dp){
            $capKdPengeluaran = strtoupper(substr($dp['kd_pengeluaran'], 0, 6));
            $nestedData = array();
            $nestedData[] = $dp['nama']."<br/>".$capKdPengeluaran;
            $nestedData[] = $dp['deks'];
            $nestedData[] = $dp['kategori'];
            $nestedData[] = "Rp.".number_format($dp['total']);
            $nestedData[] = $dp['operator'];
            $nestedData[] = "<a href='#!' data-id='".$dp['kd_pengeluaran']."' class='btn btn-sm btn-primary btnDetail btn-icon icon-left'><i class='fas fa-info-circle'></i> Detail</a>";
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),  
            "recordsTotal"    => intval( $totalPengeluaran ), 
            "recordsFiltered" => intval( $totalPengeluaran ), 
            "data"            => $data );
    
          $this -> toJson($json_data);
    }

    public function prosesPengeluaran()
    {
        $this -> state($this -> su) -> csrfCek();
        //buat kode pengeluaran
        $kdPengeluaran  = $this -> rnstr(20);
        //ambil post data dari form
        $nama           = $this -> inp('nama');
        $deks           = $this -> inp('deks');
        $kategori       = $this -> inp('kategori');
        //clearkan tanda (.) pada nilai total
        $total          = str_replace('.', '', $this -> inp('total'));
        $waktu          = $this -> waktu();
        $operator       = $this -> getses('userSession');
        //simpan data pengeluaran
        $this -> state($this -> sn) -> prosesPengeluaran($kdPengeluaran, $nama, $deks, $kategori, $total, $operator, $waktu);
        //simpan ke arus kas 
        $this -> state($this -> su) -> simpanArusKas($kdPengeluaran, 'Pengeluaran resto', 'keluar', $total, $waktu, $operator);
        $data['status'] = 'sukses';
        //send respon json
        $this -> toJson($data);
    }

    public function detailPengeluaran($kdTransaksi)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['pengeluaran'] = $this -> state($this -> sn) -> getDetailPengeluaran($kdTransaksi);
        $data['kdTransaksi'] = $kdTransaksi;
        $this -> bind('dasbor/pengeluaran/detailPengeluaran', $data);
    }

}