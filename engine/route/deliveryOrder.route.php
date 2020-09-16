<?php
 
class deliveryOrder extends Route{

    private $sn = 'deliveryOrderData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/deliveryOrder/deliveryOrder');
    }

    public function getDataDeliveryOrder()
    {
        $this -> state($this -> su) -> csrfCek();
        $requestData = $_REQUEST;
        $totalPesanan = $this -> state($this -> sn) -> getJlhPesanan();
        $dataPesanan = $this -> state($this -> sn) -> getDataPesanan($requestData);
        $data = array();

        foreach($dataPesanan as $ds){
            $kdPesanan = $ds['kd_pesanan'];
            $kurir = $ds['kurir'];

            if($kurir === ''){
                $kurirCap = '-';
            }else{
                $kurirCap = $kurir;
            }
            $status = $ds['status'];
            if($status === 'order_masuk'){
                $statusCap = 'Pesanan diterima';
            }else if($status === 'diproses'){
                $statusCap = 'Orderan di proses';
            }else if($status === 'dikirim'){
                $statusCap = 'Orderan di kirim';
            }else if($status === 'sampai'){
                $statusCap = 'Orderan selesai';
            }else{
                $statusCap = 'Dibatalkan';
            }

            $total = $this -> state($this -> sn) -> getTotalPesanan($kdPesanan);
            $nestedData = array();
            $nestedData[] = $kdPesanan;
            $nestedData[] = $statusCap;
            $nestedData[] = "Masuk : <b>".$ds['masuk']."</b><br/>Dikirim : <b>".$ds['dikirim']."</b><br/>Diterima : <b>".$ds['diterima']."</b>";
            $nestedData[] = $kurirCap;
            $nestedData[] = "Rp. ".number_format($total);
            $nestedData[] = "<a href='#!' class='btn btn-primary btn-sm btn-icon icon-left btnDetail' data-id='".$kdPesanan."'><i class='fas fa-info-circle'></i> Detail</a>";
            $data[] = $nestedData;
          }

        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),  
            "recordsTotal"    => intval( $totalPesanan ), 
            "recordsFiltered" => intval( $dataPesanan ), 
            "data"            => $data );
    
          echo json_encode($json_data);
    }

    public function detailPesanan($kdPesanan)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['kdPesanan'] = $kdPesanan;
        $pesanan = $this -> state($this -> sn) -> detailPesanan($kdPesanan);
        $kurir = $this -> state($this -> sn) -> getKurir();
        $status = $pesanan['status'];

        if($status === 'order_masuk'){
            $statusCap = 'Pesanan diterima';
        }else if($status === 'diproses'){
            $statusCap = 'Orderan di proses';
        }else if($status === 'dikirim'){
            $statusCap = 'Orderan di kirim';
        }else if($status === 'sampai'){
            $statusCap = 'Orderan selesai';
        }else{
            $statusCap = 'Dibatalkan';
        }
        
        $totalHarga = $this -> state('homeData') -> getTotalPesanan($kdPesanan);
        $tax = $this -> state($this -> su) -> getSettingResto('tax');
        $taxPrice = ($totalHarga * $tax) / 100;
        $totalFinal = $totalHarga + $taxPrice;
        $data['statusCap'] = $statusCap;
        $data['status'] = $status;
        $data['kurir'] = $kurir;    
        $data['waktu_order'] = $pesanan['masuk'];
        $data['namaPelanggan'] = $this -> state($this -> su) -> getNamaPelanggan($pesanan['pelanggan']);
        $data['alamatPengiriman'] = $pesanan['alamat_pengiriman'];
        $data['itemPesanan'] = $this -> state($this -> sn) -> getItemPesanan($kdPesanan);
        $data['tax'] = $tax;
        $data['taxPrice'] = $taxPrice;
        $data['totalHarga'] = $totalHarga;
        $data['totalFinal'] = $totalFinal;
        $this -> bind('dasbor/deliveryOrder/detailPesanan', $data);
    }

    public function prosesPesanan()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan = $this -> inp('kdPesanan');
        $this -> state($this -> sn) -> prosesPesanan($kdPesanan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function kirimPesanan()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan = $this -> inp('kdPesanan');
        $kurir = $this -> inp('kurir');
        $waktu = $this -> waktu();
        $this -> state($this -> sn) -> kirimPesanan($kurir, $waktu, $kdPesanan);
        // Kirim email notifikasi 
        $namaResto = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $emailHost = $this -> state($this -> su) -> getSettingResto('email_host');
        $passwordHost = $this -> state($this -> su) -> getSettingResto('email_host_password');
        $detailPesanan = $this -> state($this -> sn) -> detailPesanan($kdPesanan);
        $detailPelanggan = $this -> state($this -> sn) -> getDetailPelanggan($detailPesanan['pelanggan']);
        $namaPelanggan = $detailPelanggan['nama'];
        $penerima = $detailPelanggan['email'];
        $judul = "Pesanan Sedang Dikirim - ".$namaResto;
        $link = "90122-".$kdPesanan."-NRST-ADNRS-SPELLBEE";
        $isi = "Halo ".$namaPelanggan.", terima kasih telah melakukan pemesanan di resto kami. <br/>";
        $isi .= "Pesanan anda telah dikirim, pastikan telepon anda aktif agar kurir dapat menghubungi anda. Cek detail pesanan anda di ";
        $isi .= "<a href='".HOMEBASE."home/pesanan/".$link."'>sini</a><br/><br/><br/>Salam<br/>".$namaResto;
        $this -> kirimEmail($namaPelanggan, $penerima, $judul, $isi, $emailHost, $passwordHost);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function setSelesai()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan = $this -> inp('kdPesanan');
        $waktu = $this -> waktu();
        // Save ke pembayaran 
        $kdInvoice = date('m')."-".date('d')."-".date('Y')."-".substr($kdPesanan, 0, 4);
        $totalHarga = $this -> state('homeData') -> getTotalPesanan($kdPesanan);
        $tax = $this -> state($this -> su) -> getSettingResto('tax');
        $taxPrice = ($totalHarga * $tax) / 100;
        $totalFinal = $totalHarga + $taxPrice;
        $operator = $this -> getses('userSes');
        $this -> state($this -> sn) -> savePembayaran($kdInvoice, $kdPesanan, $waktu, $totalHarga, $taxPrice, $totalFinal, $operator);
        // Save arus kas 
        $this -> state($this -> sn) -> saveArusKas($kdPesanan, $totalFinal, $waktu, $operator);
        // Kirim email notifikasi 
        $namaResto = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $emailHost = $this -> state($this -> su) -> getSettingResto('email_host');
        $passwordHost = $this -> state($this -> su) -> getSettingResto('email_host_password');
        $detailPesanan = $this -> state($this -> sn) -> detailPesanan($kdPesanan);
        $detailPelanggan = $this -> state($this -> sn) -> getDetailPelanggan($detailPesanan['pelanggan']);

        $namaPelanggan = $detailPelanggan['nama'];
        $penerima = $detailPelanggan['email'];
        $judul = "Pesanan Selesai - ".$namaResto;
        $link = "90122-".$kdPesanan."-NRST-ADNRS-SPELLBEE";
        $isi = "Halo ".$namaPelanggan.", terima kasih telah melakukan pemesanan di resto kami. <br/>";
        $isi .= "Pesanan anda telah selesai, cek detail pesanan anda di ";
        $isi .= "<a href='".HOMEBASE."home/pesanan/".$link."'>sini</a><br/><br/><br/>Salam<br/>".$namaResto;
        $this -> kirimEmail($namaPelanggan, $penerima, $judul, $isi, $emailHost, $passwordHost);
        // Set selesai 
        $this -> state($this -> sn) -> setSelesai($waktu, $kdPesanan);
        // Send notifkasi whatsapp 
        $key = $this -> state($this -> su) -> getSettingResto('api_woo_wa');
        $hp = $detailPelanggan['no_hp'];
        $message = "Pesanan anda telah selesai. Kode pesanan : ".$kdPesanan." - Terima kasih telah melakukan transaksi di resto kami. Salam -".$namaResto;
        $this -> sendWaNotif($key, $hp, $message);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function batalkanPesanan()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdPesanan = $this -> inp('kdPesanan');
        $this -> state($this -> sn) -> hapusTemp($kdPesanan);
        $this -> state($this -> sn) -> hapusPesanan($kdPesanan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function getPesananTerbaru()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['pesanan'] = $this -> state($this -> sn) -> getPesananTerbaru();
        $this -> toJson($data);
    }

}