<?php

class bahanBaku extends Route{

    private $sn = 'bahanBakuData';

    public function index()
    {
        //data bahan baku send ke view
        $data['bahanBaku'] = $this -> state($this -> sn) -> getDataBahanBaku();
        $this -> bind('dasbor/bahanBaku/bahanBaku', $data);
    }

    public function tambahBahanBaku()
    {
        //nama bahan baku
        $nama       = $this -> inp('nama');
        //deksripsi bahan baku
        $deks       = $this -> inp('deks');
        //satuan
        $satuan     = $this -> inp('satuan');
        //kategori
        $kategori   = $this -> inp('kategori');
        //stok
        $stok       = $this -> inp('stok');
        //kd bahan
        $kdBahan    = $this -> rnint(4);
        //cek kode bahan & nama 
        $cek = $this -> state($this -> sn) -> cekNamaBahan($nama);
        //cek status login
        if($cek === true){
            $data['status'] = 'error';
        }else{
            $this -> state($this -> sn) -> tambahBahan($kdBahan, $nama, $deks, $kategori, $satuan, $stok);
            $data['status'] = 'success';
        }
        //send respon to json
        $this -> toJson($data);
    }

}