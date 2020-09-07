<?php
// DELIVERY ORDER ROUTE 
class deliveryOrder extends Route{
    // INISIALISASI STATE
    private $sn = 'deliveryOrderData';
    private $su = 'utilityData';

    public function index()
    {
        $this -> bind('dasbor/deliveryOrder/deliveryOrder');
    }

    public function getDataDeliveryOrder()
    {
        $requestData = $_REQUEST;
        $totalPesanan = $this -> state($this -> sn) -> getJlhPesanan();
        $dataPesanan = $this -> state($this -> sn) -> getDataPesanan($requestData);
        $data = array();

        foreach($dataPesanan as $ds){
            $kdPesanan = $ds['kd_pesanan'];
            // PREPARE DATA 
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
            $nestedData[] = "Masuk : <b>".$ds['masuk']."</b>";
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
        $kdPesanan = $this -> inp('kdPesanan');
        $this -> state($this -> sn) -> prosesPesanan($kdPesanan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function kirimPesanan()
    {
        $kdPesanan = $this -> inp('kdPesanan');
        $kurir = $this -> inp('kurir');
        $waktu = $this -> waktu();
        $this -> state($this -> sn) -> kirimPesanan($kurir, $waktu, $kdPesanan);
        //kirim email notifikasi 
        

        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function setSelesai()
    {
        $kdPesanan = $this -> inp('kdPesanan');
        $waktu = $this -> waktu();
        //kirim email notifikasi 
        $namaResto = $this -> state($this -> su) -> getSettingResto('nama_resto');
        $emailHost = $this -> state($this -> su) -> getSettingResto('email_host');
        $passwordHost = $this -> state($this -> su) -> getSettingResto('email_host_password');
        $detailPesanan = $this -> state($this -> sn) -> detailPesanan($kdPesanan);
        $detailPelanggan = $this -> state($this -> sn) -> getDetailPelanggan($detailPesanan['pelanggan']);
        $namaPelanggan = $detailPelanggan['nama'];
        $penerima = $detailPelanggan['email'];
        $judul = "Pesanan Selesai - ".$namaResto;
        $isi = "Halo ".$namaPelanggan.", terima kasih telah melakukan pemesanan di resto kami. <br/>";
        $isi .= "Pesanan anda telah selesai, cek detail pesanan anda di ";
        $isi .= "<a href='".HOMEBASE."home/pesanan/".$kdPesanan."'>Sini</a><br/><br/><br/>Salam<br/>".$namaResto;
        $this -> kirimEmail($namaPelanggan, $penerima, $judul, $isi, $emailHost, $passwordHost);
        //set selesai 
        
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function batalkanPesanan()
    {
        $kdPesanan = $this -> inp('kdPesanan');
        $this -> state($this -> sn) -> hapusTemp($kdPesanan);
        $this -> state($this -> sn) -> hapusPesanan($kdPesanan);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}