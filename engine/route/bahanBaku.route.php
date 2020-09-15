<?php

class bahanBaku extends Route{

    private $sn = 'bahanBakuData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['bahanBaku']  = $this -> state($this -> sn) -> getDataBahanBaku();
        $data['kategori']   = $this -> state($this -> su) -> getDataKategoriBahanBaku();
        $this -> bind('dasbor/bahanBaku/bahanBaku', $data);
    }

    public function tambahBahanBaku()
    {
        $this -> state($this -> su) -> csrfCek();
        $nama       = $this -> inp('nama');
        $deks       = $this -> inp('deks');
        $satuan     = $this -> inp('satuan');
        $kategori   = $this -> inp('kategori');
        $stok       = $this -> inp('stok');
        $kdBahan    = $this -> rnint(4);
        // CEK APAKAH ADA NAMA BAHAN BAKU YANG SAMA 
        $cek        = $this -> state($this -> sn) -> cekNamaBahan($nama);
        if($cek === true){
            $data['status'] = 'error';
        }else{
            $this -> state($this -> sn) -> tambahBahan($kdBahan, $nama, $deks, $kategori, $satuan, $stok);
            $data['status'] = 'success';
        }
        
        $this -> toJson($data);
    }

    public function detailBahanBaku($kdBahan)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['bahanBaku']          = $this -> state($this -> sn) -> detailBahanBaku($kdBahan);
        $data['totalKonsumsi']      = $this -> state($this -> sn) -> getTotalKonsumsi($kdBahan);
        $data['historiPembelian']   = $this -> state($this -> sn) -> getHistoriPembelian($kdBahan);
        $data['kategori']           = $this -> state($this -> su) -> getDataKategoriBahanBaku();
        $this -> bind('dasbor/bahanBaku/detailBahanBaku', $data);
    }

    public function updateBahanBaku()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdBahan        = $this -> inp('kdBahan');
        $nama           = $this -> inp('nama');
        $deks           = $this -> inp('deks');
        $kategori       = $this -> inp('kategori');
        $satuan         = $this -> inp('satuan');
        $stok           = $this -> inp('stok');
        $this -> state($this -> sn) -> updateBahanBaku($nama, $deks, $kategori, $satuan, $stok, $kdBahan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function hapusBahanBaku()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdBahan        = $this -> inp('kdBahan');
        $this -> state($this -> sn) -> hapusBahanBaku($kdBahan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}