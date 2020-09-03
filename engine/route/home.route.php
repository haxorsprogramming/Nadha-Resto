<?php

class home extends Route{

    private $sn = 'homeData';
    private $su = 'utilityData';

    public function index()
    {   
        $this -> state($this -> su) -> csrfBuild();
        $data['namaResto']  = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $data['dataSlider'] = $this -> state($this -> sn) -> getDataSlider();
        $data['dataMenu']   = $this -> state($this -> sn) -> getDataMenu();  
        $this -> bind('/home/home', $data);   
    }

    public function selfservice()
    {
        $this -> state($this -> su) -> csrfBuild();
        $data['namaResto'] = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $data['kategoriMenu'] = $this -> state($this -> sn) -> getKategoriMenu();
        $data['promo'] = $this -> state($this -> sn) -> getPromo();
        $this -> bind('/home/selfService', $data);
    }

    public function getKdTemp()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['kdTemp'] = strtoupper($this -> rnstr(15));
        $this -> toJson($data);
    }

    public function saveTemp()
    {
        $this -> state($this -> su) -> csrfCek();
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
        $this -> state($this -> su) -> csrfCek();
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
        $this -> state($this -> su) -> csrfCek();
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
        }else{
            $idPelanggan = $this -> rnint(8);
            $data['kdPelanggan'] = $idPelanggan;
            //buat pelanggan baru 
            $this -> state($this -> sn) -> createPelanggan($idPelanggan, $nama, $alamat, $hp, $email, $waktu);
            //save ke tabel delivery order
            $this -> state($this -> sn) -> createOrder($kdPesanan, $idPelanggan, $tipePembayaran, $alamat, $waktu);
        }
        //Kirim email ke pelanggan
        $namaResto = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $nama = $nama;
        $penerima = $email;
        $emailHost = $this -> state($this -> su) -> getSettingResto('email_host');
        $passwordHost = $this -> state($this -> su) -> getSettingResto('email_host_password');
        $judul = 'Informasi pemesanan makanan - '.$namaResto;
        $isi = 'Halo  '.$nama.', terima kasih telah melakukan pemesanan di resto kami. Berikut ada detail dari pesanan anda : <br/>';
        $isi .= "<h5>Kode Pesanan : <b>".$kdPesanan."</b></h5><br/>";
        $isi .= "Nama Pemesan : ".$nama."<br/>";
        $isi .= "Alamat pengiriman : ".$alamat."<br/>";
        $isi .= "Waktu pemesanan : ".$waktu."<br/>";
        $isi .= "Item pesanan <br/>";
        $isi .= "<table border='1'>";
        $isi .= "<tr><td>Item</td><td>Harga @</td><td>Qt</td><td>Total</td></tr>";
        $dataPesanan = $this -> state($this -> sn) -> getDetailPesanan($kdPesanan);
        $totalHarga = 0;
        foreach($dataPesanan as $dp){
            $namaMenu = $this -> state($this -> su) -> getNamaMenu($dp['kd_item']);
            $totalHarga = $totalHarga + $dp['total'];
            $isi .= "<tr><td>".$namaMenu."</td><td>Rp. ".number_format($dp['harga_at'])."</td><td>".$dp['qt']."</td><td>Rp. ".number_format($dp['total'])."</td></tr>";
        }
        $isi .= "</table><br/>";
        $isi .= "Total : Rp. ".number_format($totalHarga)."<br/>";
        $isi .= "Silahkan cek status pemesanan anda di <a href='".HOMEBASE."home/cekPemesanan/".$kdPesanan."'>Sini</a>";
        $this -> kirimEmail($nama, $penerima, $judul, $isi, $emailHost, $passwordHost);
        
        $data['status'] = $cekHp;
        $this -> toJson($data);
    }

    public function booking()
    {
        
    }

    public function cekPemesanan($kdPemesanan)
    {
        echo $kdPemesanan;
    }

    public function konfirmasi()
    {
        $this -> bind('home/konfirmasi');
    }

}