<?php
 
class dbMigrate extends Route{

    private $sn = 'dbMigrateData';
    private $su = 'utilityData';
    
    public function index()
    {
        echo "<pre><h3>Database migrate - NadhaResto Apps</h3><br/>";
        echo "-> Sebelum melakukan migrasi database, pastikan path server telah di set<br/>";
        echo "-> Jangan lupa buat database sesuai dengan settingan yang telah di buat<br/>";
        echo "-> Proses akan membuat tabel, & feeder data inisialisasi secara otomatis<br/>";
        echo "-> Setelah melakukan migrate, silahkan lihat tabel di database apakah sudah ter-create atau tidak</br>";
        echo "-> Apabila proses gagal, coba periksa kembali apakah settingan path server & database sudah sesuai<br/>";
        echo "-> Apabila proses berhasil, akan diarahkan secara otomatis ke halaman home aplikasi<br/>";
        echo "-> Silahkan kontak tim haxorsprogramming jika mengalami kendala dalam proses migrasi database";
        echo "<a href='".HOMEBASE."dbMigrate/startMigrate'><h3>Start Migrate</h3></a></pre>";
    }

    public function startMigrate()
    {
        $this -> state($this -> su) -> csrfCek();
        $this -> state($this -> sn) -> create_tbl_arus_kas();
        $this -> state($this -> sn) -> create_tbl_bahan_baku();
        $this -> state($this -> sn) -> create_tbl_bantuan();
        $this -> state($this -> sn) -> create_tbl_csrf_token();
        $this -> state($this -> sn) -> create_tbl_delivery_order();
        $this -> state($this -> sn) -> create_tbl_firebase_config();
        $this -> state($this -> sn) -> create_tbl_kategori_menu();
        $this -> state($this -> sn) -> create_tbl_meja();
        $this -> state($this -> sn) -> create_tbl_menu();
        $this -> state($this -> sn) -> create_tbl_mitra();
        $this -> state($this -> sn) -> create_tbl_operator();
        $this -> state($this -> sn) -> create_tbl_pelanggan();
        $this -> state($this -> sn) -> create_tbl_pembayaran();
        $this -> state($this -> sn) -> create_tbl_pembelian_bahan_baku();
        $this -> state($this -> sn) -> create_tbl_pengeluaran();
        $this -> state($this -> sn) -> create_tbl_pesanan();
        $this -> state($this -> sn) -> create_tbl_promo();
        $this -> state($this -> sn) -> create_tbl_setting();
        $this -> state($this -> sn) -> create_tbl_slider();
        $this -> state($this -> sn) -> create_tbl_temp_pembelian_bahan_baku();
        $this -> state($this -> sn) -> create_tbl_temp_pesanan();
        $this -> state($this -> sn) -> create_tbl_temp_self_service();
        $this -> state($this -> sn) -> create_tbl_timeline();
        $this -> state($this -> sn) -> create_tbl_transaksi();
        $this -> state($this -> sn) -> create_tbl_user();
        $this -> goto('home');
    }

}