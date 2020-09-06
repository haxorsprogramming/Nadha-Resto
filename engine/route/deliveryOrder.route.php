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
        $this -> bind('dasbor/deliveryOrder/detailPesanan', $data);
    }

}