<?php 

class utilityData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }
    //CSRF security build 
    public function csrfBuild()
    {
        $string = '1234567890poiuytrewqasdfghjklmnbvcxz';
        $token = str_shuffle($string);

        if(isset($_SESSION['csrf_token'])){
          
        }else{
          $_SESSION['csrf_token'] = $token;
        }
    }
    //CSRF security cek
    public function csrfCek()
    {
        $data['status'] = 'no open to public';
        if(isset($_SESSION['csrf_token'])){
          
        }else{
          echo json_encode($data);
          die();
        }
    }
    //fungsi ambil nilai pengaturan restoran dengan parameter kd_setting
    public function getSettingResto($kdSetting)
    {
        $this -> st -> query("SELECT value FROM tbl_setting WHERE kd_setting='$kdSetting';");
        $q = $this -> st -> querySingle();
        return $q['value'];
    }
    //fungsi ambil data mitra
    public function getMitraData($kdMitra)
    {
        $this -> st -> query("SELECT * FROM tbl_mitra WHERE kd_mitra='$kdMitra';");
        return $this -> st -> querySingle();
    }
    //fungsi ambil jumlah pengunjung
    public function getJlhPengunjung()
    {
        $this -> st -> query("SELECT SUM(jlh_tamu) FROM tbl_meja;");
        $q = $this -> st -> querySingle();
        return $q['SUM(jlh_tamu)'];
    }
    //fungsi ambil jumlah pelanggan
    public function getJlhPelanggan()
    {
        $this -> st -> query("SELECT COUNT(id) FROM tbl_pelanggan;");
        $q = $this -> st -> querySingle();
        return $q['COUNT(id)'];
    }
    //fungsi ambil data menu terlaris
    public function getMenuTerlaris()
    {
        $this -> st -> query("SELECT * FROM tbl_menu ORDER BY total_dipesan DESC LIMIT 0, 5;");
        return $this -> st -> queryAll();
    }
    //fungsi ambil transaksi terakhir
    public function getTransaksiTerakhir()
    {
        $this -> st -> query("SELECT * FROM tbl_pembayaran ORDER BY waktu DESC LIMIT 0, 7;");
        return $this -> st -> queryAll();
    }
    //fungsi ambil kd_pelanggan dari tbl_pesanan dengan parameter kd_pesanan
    public function getPelangganFromPesanan($kdPesanan)
    {
        $this -> st -> query("SELECT pelanggan FROM tbl_pesanan WHERE kd_pesanan='$kdPesanan';");
        $q = $this -> st -> querySingle();
        return $q['pelanggan'];
    }
    public function getPelangganFromDevOrder($kdPesanan)
    {
        $this -> st -> query("SELECT pelanggan FROM tbl_delivery_order WHERE kd_pesanan='$kdPesanan';");
        $q = $this -> st -> querySingle();
        return $q['pelanggan'];
    }
    //fungsi ambil nama bahan baku 
    public function getBahanBakuData($kdBahan)
    {
        $this -> st -> query("SELECT nama,kategori,satuan FROM tbl_bahan_baku WHERE kd_bahan='$kdBahan';");
        return $this -> st -> querySingle();
    }
    //fungsi ambil nama pelanggan
    public function getNamaPelanggan($kdPelanggan)
    {
        $this -> st -> query("SELECT nama FROM tbl_pelanggan WHERE id_pelanggan='$kdPelanggan';");
        $qP = $this -> st -> querySingle();
        return $qP['nama'];
    }
    //fungsi ambil nama kategori 
    public function getNamaKategori($kdKategori)
    {
        $this -> st -> query("SELECT nama FROM tbl_kategori_menu WHERE id='$kdKategori';");
        $qP = $this -> st -> querySingle();
        return $qP['nama'];
    }
    //fungsi ambil nama meja dengan parameter kd_meja
    public function getNamaMeja($kdMeja)
    {
        $this -> st -> query("SELECT nama FROM tbl_meja WHERE kd_meja='$kdMeja';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }
    //fungsi ambil nama menu dengan parameter kd_menu
    public function getNamaMenu($kdMenu)
    {
        $this -> st -> query("SELECT nama FROM tbl_menu WHERE kd_menu='$kdMenu';");
        $q = $this -> st -> querySingle();
        return $q['nama'];
    }
    //fungsi ambil data menu
    public function getDataMenu()
    {
        $this -> st -> query("SELECT * FROM tbl_menu;");
        return $this -> st -> queryAll();
    }
    //fungsi ambil data kategori menu
    public function getDataKategori()
    {
        $this -> st -> query("SELECT * FROM tbl_kategori_menu;");
        return $this -> st -> queryAll();
    }
    //fungsi ambil data menu berdasarkan kategori
    public function getDataMenuKategori($kdKategori)
    {
        $this -> st -> query("SELECT * FROM tbl_menu WHERE kategori='$kdKategori';");
        return $this -> st -> queryAll();
    }
    //fungsi simpan arus kas 
    public function simpanArusKas($kdTransaksi, $tipe, $arus, $total, $waktu, $operator)
    {
        $query = "INSERT INTO tbl_arus_kas VALUES(null, '$kdTransaksi','$tipe','$arus','$total','$waktu','$operator');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }
    //fungsi ambil settingan firebase 
    public function getFirebaseSetting($kdSetting)
    {
        $this -> st -> query("SELECT value FROM tbl_firebase_config WHERE kd_setting='$kdSetting';");
        $q = $this -> st -> querySingle();
        return $q['value'];
    }
    //fungsi ambil data bantuan
    public function getBantuan()
    {
        $this -> st -> query("SELECT * FROM tbl_bantuan;");
        return $this -> st -> queryAll();
    }
    // Kategori bahan baku 
    public function getDataKategoriBahanBaku()
    {
        $kategori = array('Daging', 'Seafood', 'Karbo', 'Sayur', 'Buah', 'Mie Instan', 'Bumbu', 'Fast Food', 'Tepung', 'Lain Lain');
        return $kategori;
    }
}