<?php 

class pembayaranData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getPesananDetails($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_pesanan WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> querySingle();
    }

    public function getDataTempPesanan($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pesanan WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> queryAll();
    }

    public function getCapMenuName($kdMenu)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kd_menu='$kdMenu';");
        return  $this -> st -> querySingle();
    }

    public function getNamaPelanggan($kdPelanggan)
    {
        $this -> st -> query("SELECT nama FROM tbl_pelanggan WHERE id_pelanggan='$kdPelanggan';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }

    public function getCapMeja($kdMeja)
    {
        $this -> st -> query("SELECT nama FROM tbl_meja WHERE kd_meja='$kdMeja';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }

    public function getTax()
    {
        $this -> st -> query("SELECT value FROM tbl_setting WHERE kd_setting='tax';");
        $q = $this -> st -> querySingle();
        return $q['value'];
    }

    public function cekPromoValid($kdPromo)
    {
        $this -> st -> query("SELECT id FROM tbl_promo WHERE nama='$kdPromo';");
        $q = $this -> st -> numRow();
        if($q > 0){
            return false;
        }else{
            return true;
        }
    }

    public function getDataPromo($kdPromo)
    {
       $this -> st -> query("SELECT * FROM tbl_promo WHERE nama='$kdPromo';");
       return $this -> st -> querySingle();
    }

    public function prosesPembayaran($kdInvoice, $kdPesanan, $waktu, $totalHarga, $kdPromo, $diskon, $tax, $totalFinal, $tunai, $kembali, $operator)
    {
        $query = "INSERT INTO tbl_pembayaran VALUES(null, '$kdInvoice','$kdPesanan','$waktu','$totalHarga','$kdPromo','$diskon','$tax','$totalFinal','$tunai','$kembali','$operator');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

}