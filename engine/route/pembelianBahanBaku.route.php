<?php

class pembelianBahanBaku extends Route{

    private $sn = 'pembelianBahanBakuData';
    private $su = 'utilityData';

    public function index()
    {
        $data['mitra'] = $this -> state($this -> sn) -> getMitra();
        $this -> bind('dasbor/pembelianBahanBaku/pembelianBahanBaku', $data);
    }

    public function getDataPembelianBahanBaku()
    {
        $requestData = $_REQUEST;
        $totalPembelian = $this -> state($this -> sn) -> getTotalPembelianBahanBaku();
        $dataPembelianBahanBaku = $this -> state($this -> sn) -> getDataPembelianBahanBaku($requestData);
        $data = array();

        foreach($dataPembelianBahanBaku as $dp){
            $nestedData = array();
            $nestedData[] = strtoupper($dp['kd_pembelian']);
            $nestedData[] = $this -> state($this -> sn) -> getNamaMitra($dp['mitra']);
            $nestedData[] = "Rp. ".number_format($dp['total']);
            $nestedData[] = $dp['waktu'];
            $nestedData[] = "<a href='#!' class='btn btn-primary btn-icon icon-left btnDetail' data-id='".$dp['kd_pembelian']."'><i class='fas fa-info-circle'></i> Detail</a>";
            $data[] = $nestedData;
        }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),  
            "recordsTotal"    => intval( $totalPembelian ), 
            "recordsFiltered" => intval( $totalPembelian ), 
            "data"            => $data );
    
          $this -> toJson($json_data);

    }

    public function getDetailPembelian()
    {
        //ambil kode pembelian dari method post
        $kdPembelian = $this -> inp('kdPembelian');
        //ambil query data pembelian
        $qPembelian = $this -> state($this -> sn) ->  getDataPembelian($kdPembelian);
        //ambil variabel kd_mitra & data query mitra
        $kdMitra = $qPembelian['mitra'];
        $qMitra = $this -> state($this -> su) -> getMitraData($kdMitra);
        //ambil data total pembelian dan masukkan ke dalam variabel data
        $data['total'] = $qPembelian['total'];
        //ambil nama resto dan masukkan ke dalam variabel data
        $data['namaResto'] = $this -> state($this -> su) -> getSettingResto('nama_resto');
        //ambil alamat resto dan masukkan ke dalam variabel data
        $data['alamatResto'] = $this -> state($this -> su) -> getSettingResto('alamat_resto');
        //ambil nomor hp resto dan masukkan ke dalam variabel data
        $data['noHpResto'] = $this -> state($this -> su) -> getSettingResto('nomor_handphone');
        //ambil nama mitra dan masukkan ke variabel data
        $data['namaMitra'] = $qMitra['nama'];
        $data['alamatMitra'] = $qMitra['alamat'];
        $data['noHpMitra'] = $qMitra['hp'];
        //data waktu 
        $data['waktuPembelian'] = date('d M Y', strtotime($qPembelian['waktu']));
        //query pembelian dimasukkan ke dalam variabel data
        $data['kdPembelian'] = $qPembelian;
        //kirim respon json dari variabel data
        $this -> toJson($data);
    }

    public function getItemPembelian()
    {
         //ambil kode pembelian dari method post
         $kdPembelian = $this -> inp('kdPembelian');
         $qItemPembelian = $this -> state($this -> sn) -> getItemPembelian($kdPembelian);
         foreach($qItemPembelian as $ip) {
             $qItem = $this -> state($this -> su) -> getBahanBakuData($ip['kd_item']);
             $arrTemp['kdBahan'] = $ip['kd_item'];
             $arrTemp['qt'] = $ip['qt'];
             $arrTemp['namaBahan'] = $qItem['nama'];
             $arrTemp['kategori'] = $qItem['kategori'];
             $arrTemp['satuan'] = $qItem['satuan'];
             $data['itemPembelian'][] = $arrTemp;
         }
         $this -> toJson($data);
    }

    public function detailPembelian($kdPembelian)
    {
        $data['kdPembelian'] = $kdPembelian;
        $this -> bind('dasbor/pembelianBahanBaku/detailPembelianBahanBaku', $data);
    }

    public function getDataBahanBakuKategori()
    {
        $kategori           = $this -> inp('kategori');
        $data['bahanBaku']  = $this -> state($this -> sn) -> getDataBahanBakuKategori($kategori);
        $this -> toJson($data);
    }

    public function prosesPembelian()
    {
        $kdPembelian = $this -> rnstr(15);
        $waktu = $this -> waktu();
        $mitra = $this -> inp('mitra');
        $nominal = $this -> inp('nominal');
        $operator = $this -> getses('userSession');
        $nominalClear = str_replace('.','',$nominal);
        $this -> state($this -> sn) -> prosesPembelian($kdPembelian, $mitra, $waktu, $nominalClear, $operator);
        //simpan ke arus kas
        $this -> state($this -> su) -> simpanArusKas($kdPembelian, 'Pembelian bahan baku resto', 'keluar', $nominalClear, $waktu, $operator);
        $data['kdPembelian'] = $kdPembelian;
        $this -> toJson($data);
    }

    public function updateTempPembelian()
    {
        $kdTemp = $this -> rnstr(20);
        $kdPembelian = $this -> inp('kdPembelian');
        $kdItem = $this -> inp('kdItem');
        $qt = $this -> inp('qt');
        //update temp pembelian
        $this -> state($this -> sn) -> updateTemp($kdTemp, $kdPembelian, $kdItem, $qt);
        //update stok pembelian
        $this -> state($this -> sn) ->  updateStok($kdItem, $qt);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}