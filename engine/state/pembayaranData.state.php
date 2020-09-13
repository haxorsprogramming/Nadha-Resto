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

    public function updateStatusPembayaran($kdPesanan, $waktu)
    {
        $query = "UPDATE tbl_pesanan SET status='done', waktu_selesai='$waktu' WHERE kd_pesanan='$kdPesanan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function updateMeja($meja)
    {
        $query = "UPDATE tbl_meja SET status='leave' WHERE nama='$meja';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function updateKuotaPromo($kdPromo)
    {
        //ambil kuota awal 
        $this -> st -> query("SELECT kuota FROM tbl_promo WHERE nama='$kdPromo';");
        $q = $this -> st -> querySingle();
        $kuotaLama = $q['kuota'];
        $kuotaBaru = $kuotaLama - 1;
        $qUpdate = "UPDATE tbl_promo SET kuota='$kuotaBaru' WHERE nama='$kdPromo';";
        $this -> st -> query($qUpdate);
        $this -> st -> queryRun();
    }

    public function kosongkanMeja($kdMeja)
    {
        $query = "UPDATE tbl_meja SET jlh_tamu='0' WHERE nama='$kdMeja';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function updateTotalDipesan($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pesanan WHERE kd_pesanan='$kdPesanan';");
        $dtp = $this -> st -> queryAll();
        foreach($dtp as $dp){
            $kdMenu = $dp['kd_menu'];
            $qtBuy = $dp['qt'];
            //cari jlh pesanan di menu sekarang 
            $this -> st -> query("SELECT total_dipesan FROM tbl_menu WHERE kd_menu='$kdMenu';");
            $qtMenu = $this -> st -> querySingle();
            $tDipesanMenu = $qtMenu['total_dipesan'];
            //update jlh dipesan 
            $tDipesanNow = $qtBuy + $tDipesanMenu;
            $qUpdate = "UPDATE tbl_menu SET total_dipesan='$tDipesanNow' WHERE kd_menu='$kdMenu';";
            $this -> st -> query($qUpdate);
            $this -> st -> queryRun();
        }
    }

    public function cetakStruk($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_pesanan WHERE kd_pesanan='$kdPesanan';");
        $qPesanan = $this -> st -> queryAll();
        return $qPesanan;
    }

    public function updateTransaksi($tokenTransaksi, $kdPesanan, $arus, $totalFinal, $waktu, $operator)
    {
        $query = "INSERT INTO tbl_transaksi VALUES(null, '$tokenTransaksi', '$kdPesanan', '$arus', '$totalFinal', '$waktu', '$operator');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

} 