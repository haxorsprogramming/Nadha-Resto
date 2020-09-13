<?php 

class deliveryOrderData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getJlhPesanan()
    {
        $this -> st -> query("SELECT id FROM tbl_delivery_order;");
        return $this -> st -> numRow();
    }

    public function getDataPesanan($requestData)
    {
        $this -> st -> query("SELECT * FROM tbl_delivery_order ORDER BY masuk DESC LIMIT ".$requestData['start']." ,".$requestData['length'].";");
        return $this -> st -> queryAll();
    }

    public function getTotalPesanan($kdPesanan)
    {
        $this -> st -> query("SELECT SUM(total) FROM tbl_temp_self_service WHERE kd_temp='$kdPesanan';");
        $q = $this -> st -> querySingle();
        return $q['SUM(total)'];
    }

    public function detailPesanan($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_delivery_order WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> querySingle();
    }

    public function getItemPesanan($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_self_service WHERE kd_temp='$kdPesanan';");
        return $this -> st -> queryAll();
    }

    public function hapusPesanan($kdPesanan)
    {
        $query = "DELETE FROM tbl_delivery_order WHERE kd_pesanan='$kdPesanan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function hapusTemp($kdPesanan)
    {
        $query = "DELETE FROM tbl_temp_self_service WHERE kd_temp='$kdPesanan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function prosesPesanan($kdPesanan)
    {
        $query = "UPDATE tbl_delivery_order SET status='diproses', dikirim='0000-00-00 00:00:00' WHERE kd_pesanan='$kdPesanan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function kirimPesanan($kurir, $waktu, $kdPesanan)
    {
        $query = "UPDATE tbl_delivery_order SET kurir='$kurir', status='dikirim', dikirim='$waktu' WHERE kd_pesanan='$kdPesanan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getKurir()
    {
        $this -> st -> query("SELECT * FROM tbl_user WHERE tipe='kurir';");
        return $this -> st -> queryAll();
    }

    public function getDetailMenu($kdMenu)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kd_menu='$kdMenu';");
        return $this -> st -> querySingle();
    }

    public function getDetailPelanggan($kdPelanggan)
    {
        $this -> st -> query("SELECT * FROM tbl_pelanggan WHERE id_pelanggan='$kdPelanggan';");
        return $this -> st -> querySingle();
    }

    public function savePembayaran($kdInvoice, $kdPesanan, $waktu, $totalHarga, $taxPrice, $totalFinal, $operator)
    {
        $query = "INSERT INTO tbl_pembayaran VALUES(null,'$kdInvoice','$kdPesanan','$waktu','$totalHarga','','','$taxPrice','$totalFinal','$totalFinal','0','$operator');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function setSelesai($waktu, $kdPesanan)
    {
        $query = "UPDATE tbl_delivery_order SET status='sampai', diterima='$waktu' WHERE kd_pesanan='$kdPesanan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function saveArusKas($kdPesanan, $totalFinal, $waktu, $operator)
    {
        $query = "INSERT INTO tbl_arus_kas VALUES(null,'$kdPesanan','Pembayaran Kasir','masuk','$totalFinal','$waktu','$operator');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getPesananTerbaru()
    {
        $this -> st -> query("SELECT * FROM tbl_delivery_order ORDER BY masuk DESC LIMIT 0, 5");
        return $this -> st -> queryAll();
    }

}