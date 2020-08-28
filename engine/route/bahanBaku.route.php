<?php

class bahanBaku extends Route{
    //inisialisasi state
    private $sn = 'bahanBakuData';
    private $su = 'utilityData';

    public function index()
    {
        $data['bahanBaku'] = $this -> state($this -> sn) -> getDataBahanBaku();
        $this -> bind('dasbor/bahanBaku/bahanBaku', $data);
    }

    public function tambahBahanBaku()
    {
        $nama       = $this -> inp('nama');
        $deks       = $this -> inp('deks');
        $satuan     = $this -> inp('satuan');
        $kategori   = $this -> inp('kategori');
        $stok       = $this -> inp('stok');
        $kdBahan    = $this -> rnint(4);
        //cek nama bahan duplikat
        $cek        = $this -> state($this -> sn) -> cekNamaBahan($nama);
        if($cek === true){
            $data['status'] = 'error';
        }else{
            $this -> state($this -> sn) -> tambahBahan($kdBahan, $nama, $deks, $kategori, $satuan, $stok);
            $data['status'] = 'success';
        }
        //send respon to json
        $this -> toJson($data);
    }

    public function detailBahanBaku($kdBahan)
    {
        $data['bahanBaku'] = $this -> state($this -> sn) -> detailBahanBaku($kdBahan);
        $data['kategori'] = $this -> state($this -> su) -> getDataKategori();
        $this -> bind('dasbor/bahanBaku/detailBahanBaku', $data);
    }

}