<?php

class home extends Route{

    private $sn = 'homeData';
    private $su = 'utilityData';

    public function index()
    {   
        $data['namaResto']  = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $data['dataSlider'] = $this -> state($this -> sn) -> getDataSlider();
        $data['dataMenu']   = $this -> state($this -> sn) -> getDataMenu();  
        $this -> bind('/home/home', $data);   
    }

    public function selfservice()
    {
        $data['namaResto'] = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $data['kategoriMenu'] = $this -> state($this -> sn) -> getKategoriMenu();
        $data['promo'] = $this -> state($this -> sn) -> getPromo();
        $this -> bind('/home/selfService', $data);
    }

    public function getKdTemp()
    {
        $data['kdTemp'] = $this -> rnstr(15);
        $this -> toJson($data);
    }

    public function saveTemp()
    {
        $kdTemp = $this -> inp('kdTemp');
        $kdMenu = $this -> inp('kdMenu');
        $hargaAt = $this -> inp('hargaAt');
        $qt = $this -> inp('qt');
        $total = $this -> inp('total');
        //cek apakah status cart
        $this -> state($this -> sn) -> saveTemp($kdTemp, $kdMenu, $qt, $hargaAt, $total);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function checkOut($kdTemp)
    {
        $data['kdTemp'] = $kdTemp;
        $data['kdCaps'] = substr(strtoupper($kdTemp), 0, 7);
        $data['namaResto'] = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $dataTemp = $this -> state($this -> sn) -> getCheckoutItem($kdTemp);
        $totalHarga = $this -> state($this -> sn) -> getTotalPesanan($kdTemp);
        $tax = $this -> state($this -> su) -> getSettingResto('tax');
        $taxCharge = ($totalHarga * $tax) / 100;
        $data['hargaAfterTax'] = $totalHarga + $taxCharge;
        $data['totalHarga'] = $totalHarga;
        $data['taxCharge'] = $taxCharge;
        $data['tax'] = $tax;
        $data['promo'] = $this -> state($this -> sn) -> getPromo();
        foreach($dataTemp as $dt){
            $kdItem = $dt['kd_item'];
            $arrTemp['kdItem'] = $kdItem;
            $arrTemp['namaMenu'] = $this -> state($this -> su) -> getNamaMenu($kdItem);
            $arrTemp['qt'] = $dt['qt'];
            $arrTemp['total'] = $dt['total'];
            $arrTemp['hargaAt'] = $dt['harga_at'];
            $data['itemPesanan'][]  = $arrTemp; 
        }
        $this -> bind('/home/checkout', $data);
    }

    public function deliveryOrderProses()
    {
        // {'email':email, 'nama':nama, 'alamat':alamat, 'hp':hp, 'tipePembayaran':tipePembayaran}
        $email = $this -> inp('email');
        $nama = $this -> inp('nama');
        $alamat = $this -> inp('alamat');
        $hp = $this -> inp('hp');
        $tipePembayaran = $this -> inp('tipePembayaran');
        $kdPesanan = $this -> inp('kdPesanan');
        //save ke tbl_deliveri order
        //cari pelanggan dari nomor hp
        
        // $query = "INSERT INTO tbl_delivery ORDER VALUES(null, '$kdPesanan','$);";
        $data['status'] = '200';
        $this -> toJson($data);
    }

}