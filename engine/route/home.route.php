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
         //cek apakah kode pesanan valid atau tidak 
        $cp = $this -> state($this -> sn) -> cekPesanan($kdTemp);
        if($cp === true){
            $this -> goto('../');
        }else{
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
        $waktu = $this -> waktu();
        //cari pelanggan dari nomor hp
        $cekHp = $this -> state($this -> sn) -> cekPelangganWithHp($hp);
        //jika true, maka ambil kd pelanggan, jika false, buat pelanggn baru 
        if($cekHp === true){
            $kdPelanggan = $this -> state($this -> sn) -> getPelangganDataWithHp($hp);
            $data['kdPelanggan'] = $kdPelanggan;
            //save ke tabel delivery order
            $this -> state($this -> sn) -> createOrder($kdPesanan, $kdPelanggan, $tipePembayaran, $alamat, $waktu);
            //kode kirim email (phpmailer msh bermasalah)
            
        }else{
            $idPelanggan = $this -> rnint(8);
            $data['kdPelanggan'] = $idPelanggan;
            //buat pelanggan baru 
            $this -> state($this -> sn) -> createPelanggan($idPelanggan, $nama, $alamat, $hp, $email, $waktu);
            //save ke tabel delivery order
            $this -> state($this -> sn) -> createOrder($kdPesanan, $idPelanggan, $tipePembayaran, $alamat, $waktu);
        }
        $data['status'] = $cekHp;
        $this -> toJson($data);
    }

    public function invoice()
    {

    }

    public function firebase()
    {
        $this ->  bind('/home/firebase');
    }

}