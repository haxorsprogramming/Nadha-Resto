<?php 

class pesananData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataPesanan($page)
    {
        $totalPage = 10;
        if($page === 1){
            $startPage = 0;
        }else{
            $startPage = $totalPage * $page - 10;
        }
        $this -> st -> query("SELECT * FROM tbl_pesanan ORDER BY id DESC LIMIT $startPage, $totalPage;");
        return $this -> st -> queryAll();
    }

    public function getJlhPesanan()
    {
        $this -> st -> query("SELECT id FROM tbl_pesanan;");
        return $this -> st -> numRow();
    }

    public function cariPesanan($char)
    {
        $this -> st -> query("SELECT * FROM tbl_pesanan WHERE (kd_pesanan LIKE '%$char%');");
        return $this -> st -> numRow();
    }

    public function getDataPesananCari($char)
    {
        $this -> st -> query("SELECT * FROM tbl_pesanan WHERE(kd_pesanan LIKE '%$char%')");
        return $this -> st -> queryAll();
    }

    public function getDataMeja()
    {
        $this -> st -> query("SELECT * FROM tbl_meja;");
        return $this -> st ->  queryAll();
    }

    public function getDataPelanggan()
    {
        $this -> st -> query("SELECT * FROM tbl_pelanggan;");
        return $this -> st -> queryAll();
    }

    public function getDataKategori()
    {
        $this -> st -> query("SELECT * FROM tbl_kategori_menu;");
        return $this -> st -> queryAll();
    }

    public function getMenuWithKategori($kdKategori)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kategori='$kdKategori';");
        return $this -> st -> queryAll();
    }

    public function buatPesanan($kdPesanan, $pelanggan, $tipe, $jlhTamu, $waktuMasuk, $operator, $meja)
    {
        $query = "INSERT INTO tbl_pesanan VALUES(null, '$kdPesanan', '$pelanggan', '$tipe', '$jlhTamu', '$meja', '$waktuMasuk', '', '$operator', 'active');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function buatPesananTakeHome($kdPesanan, $kdPelanggan, $waktu, $operator)
    {
        $query = "INSERT INTO tbl_pesanan VALUES(null, '$kdPesanan','$kdPelanggan','take_home','0','-','$waktu','','$operator','active');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function updateTempPesanan($kdTemp, $kdMenu, $kdPesanan, $hargaAt, $qt, $total)
    {
        $query = "INSERT INTO tbl_temp_pesanan VALUES(null, '$kdTemp', '$kdPesanan', '$kdMenu', '$hargaAt', '$qt', '$total');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function updateStatusMeja($kdMeja)
    {
        $query = "UPDATE tbl_meja SET status='active' WHERE kd_meja='$kdMeja';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function updateJumlahTamu($jlhTamu, $kdMeja)
    {
        $query = "UPDATE tbl_meja SET jlh_tamu='$jlhTamu' WHERE kd_meja='$kdMeja';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function getDetailPesanan($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_pesanan WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> querySingle();
    }

    public function getTempFirst($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pesanan WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> queryAll();
    }

    public function hapusTempLama($kdPesanan)
    {
        $query = "DELETE FROM tbl_temp_pesanan WHERE kd_pesanan='$kdPesanan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function hapusPesanan($kdPesanan)
    {
        $query = "DELETE FROM tbl_pesanan WHERE kd_pesanan='$kdPesanan';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

    public function detailPembayaran($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_pembayaran WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> querySingle();
    }

    public function getPesananData($kdPesanan)
    {
        $this -> st -> query("SELECT * FROM tbl_temp_pesanan WHERE kd_pesanan='$kdPesanan';");
        return $this -> st -> queryAll();
    }

} 