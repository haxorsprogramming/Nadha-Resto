<?php 

class dbMigrateData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function create_tbl_arus_kas()
    {
        $q = "CREATE TABLE `tbl_arus_kas` (
            `id` int(13) NOT NULL AUTO_INCREMENT,
            `kd_transaksi` varchar(30) DEFAULT NULL,
            `tipe` varchar(50) DEFAULT NULL,
            `arus` varchar(10) DEFAULT NULL,
            `total` int(25) DEFAULT NULL,
            `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `operator` varchar(50) DEFAULT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_bahan_baku()
    {
        $q = "CREATE TABLE `tbl_bahan_baku` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `kd_bahan` varchar(4) NOT NULL,
            `nama` varchar(200) NOT NULL,
            `deks` text NOT NULL,
            `kategori` varchar(50) NOT NULL,
            `satuan` varchar(50) NOT NULL,
            `stok` int(10) NOT NULL,
            `aktif` varchar(1) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_bantuan()
    {
        $q = "CREATE TABLE `tbl_bantuan` (
            `id` int(3) NOT NULL AUTO_INCREMENT,
            `judul` varchar(255) DEFAULT NULL,
            `deks` text,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
        // insert default data
        $this -> st -> query('INSERT INTO `tbl_bantuan` VALUES (1,"Proses pemesanan di website customer tidak bisa di proses","Pastikan settingan firebase sudah benar");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_bantuan` VALUES (2,"Print struk tidak berjalan","Pastikan koneksi ke printer, pastikan printer terdeteksi di sistem operasi. Port printer juga harus diperhatikan");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_bantuan` VALUES (3,"Key firebase sudah di masukkan, tetapi tidak bekerja","Kemungkinan rules dari realtime database path belum di aktifkan, silahkan aktifkan terlebih dahulu.");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_bantuan` VALUES (4,"Laporan tipe PDF tidak bisa di akses (print)","Masalah yang mungkin terjadi adalah jika anda menggunakan server linux sebagai webserver, pastikan folder aplikasi sudah mendapatkan hak akses penuh untuk read, write.");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_bantuan` VALUES (5,"Proses checkout tidak berjalan","Kemungkinan masalah ada di path server pada settingan file base.php, perhatikan apakah semuanya sudah benar");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_bantuan` VALUES (6,"Email tidak terkirim","Pastikan settingan SMTP sudah sesuai, jika menggunakan gmail sebagai host, pastikan settingan dari sisi gmailnya sudah di aktifkan");');
        $this -> st -> queryRun();
    }

    public function create_tbl_csrf_token()
    {
        $q = "CREATE TABLE `tbl_csrf_token` (
            `id` int(10) NOT NULL AUTO_INCREMENT,
            `token` varchar(30) DEFAULT NULL,
            `login_from` varchar(20) DEFAULT NULL,
            `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `valid_until` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `status` varchar(10) DEFAULT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_delivery_order()
    {
        $q = "CREATE TABLE `tbl_delivery_order` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `kd_pesanan` varchar(15) DEFAULT NULL,
            `pelanggan` varchar(20) DEFAULT NULL,
            `kurir` varchar(50) DEFAULT NULL,
            `status` varchar(50) DEFAULT NULL,
            `tipe_pembayaran` varchar(20) DEFAULT NULL,
            `dikirim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `diterima` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `alamat_pengiriman` text,
            `masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_firebase_config()
    {
        $q = "CREATE TABLE `tbl_firebase_config` (
            `id` int(2) NOT NULL AUTO_INCREMENT,
            `kd_setting` varchar(155) DEFAULT NULL,
            `caption` varchar(155) DEFAULT NULL,
            `value` varchar(155) DEFAULT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_kategori_menu()
    {
        $q = "CREATE TABLE `tbl_kategori_menu` (
            `id` int(3) NOT NULL AUTO_INCREMENT,
            `nama` varchar(255) NOT NULL,
            `deks` text NOT NULL,
            `active` varchar(1) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
        // insert default data
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (1,"Makanan Utama","Makanan utama\r\n","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (2,"Coffe","Coffe & Cappucino\r\n","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (3,"Side Food (Snack)","Makanan kecil & pendamping","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (4,"Cake","Kue","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (5,"Tea","Kategori minuman","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (6,"Pasta","Pasta","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (7,"Juice","","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (8,"Milkshake","","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (9,"Seafood","","1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_kategori_menu` VALUES (10,"Noodles","","1");');
        $this -> st -> queryRun();
    }

    public function create_tbl_meja()
    {
        $q = "CREATE TABLE `tbl_meja` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `kd_meja` varchar(5) NOT NULL,
            `nama` varchar(111) NOT NULL,
            `deks` text NOT NULL,
            `status` varchar(50) NOT NULL,
            `jlh_tamu` int(3) DEFAULT NULL,
            `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_menu()
    {
        $q =  "CREATE TABLE `tbl_menu` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `kd_menu` varchar(10) NOT NULL,
            `nama` varchar(200) NOT NULL,
            `deks` text NOT NULL,
            `kategori` varchar(50) NOT NULL,
            `satuan` varchar(50) NOT NULL,
            `harga` int(20) NOT NULL,
            `pic` varchar(200) NOT NULL,
            `total_dipesan` int(7) NOT NULL,
            `aktif` varchar(1) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
        // insert default data
        $this -> st -> query('INSERT INTO `tbl_menu` VALUES (1,"08128922","Nasi Goreng Spesial","Nasi goreng spesial dengan tambahan topping sosis, nugget, dan udang","1","porsi",25000,"08128922.jpg",0,"1");');
        $this -> st -> queryRun();
        $this -> st -> query('INSERT INTO `tbl_menu` VALUES (21,"45446025","Tes Manis Dingin","Teh manis dingin ukuran sedang","5","porsi",7000,"45446025.jpg",37,"1");');
        $this -> st -> queryRun();
    }

    public function create_tbl_mitra()
    {
        $q = "CREATE TABLE `tbl_mitra` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `kd_mitra` varchar(8) NOT NULL,
            `nama` varchar(155) NOT NULL,
            `deks` text NOT NULL,
            `alamat` text NOT NULL,
            `pemilik` varchar(100) NOT NULL,
            `hp` varchar(20) NOT NULL,
            `aktif` varchar(1) NOT NULL,
            `tipe` varchar(50) DEFAULT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_operator()
    {
        $q = "CREATE TABLE `tbl_operator` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `username` varchar(55) NOT NULL,
            `nama` varchar(55) NOT NULL,
            `alamat` text NOT NULL,
            `hp` varchar(20) NOT NULL,
            `posisi` varchar(50) NOT NULL,
            `total_waktu_kerja` int(10) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
        // insert default data
        $this -> st -> query('INSERT INTO `tbl_operator` VALUES (1,"admin","Admin Restoran","Bukittingi","082272177022","administrator", 0);'); 
    }

    public function create_tbl_pelanggan()
    {
        $q = "CREATE TABLE `tbl_pelanggan` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `id_pelanggan` varchar(20) NOT NULL,
            `nama` varchar(111) NOT NULL,
            `alamat` text NOT NULL,
            `no_hp` varchar(20) NOT NULL,
            `email` varchar(100) NOT NULL,
            `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
        // insert default data 
        $this -> st -> query('INSERT INTO `tbl_pelanggan` VALUES (1,"cash","Cash (Pelanggan default)","-","-","-","2020-06-22 16:07:13");');
        $this -> st -> queryRun();
    }

    public function create_tbl_pembayaran()
    {
        $q = "CREATE TABLE `tbl_pembayaran` (
            `id` int(7) NOT NULL AUTO_INCREMENT,
            `kd_invoice` varchar(30) NOT NULL,
            `kd_pesanan` varchar(30) NOT NULL,
            `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `total` int(25) NOT NULL,
            `kd_promo` varchar(111) DEFAULT NULL,
            `diskon` int(25) NOT NULL,
            `tax` int(15) DEFAULT NULL,
            `total_final` int(25) NOT NULL,
            `tunai` int(25) NOT NULL,
            `kembali` int(25) NOT NULL,
            `operator` varchar(50) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_pembelian_bahan_baku()
    {
        $q = "CREATE TABLE `tbl_pembelian_bahan_baku` (
            `id` int(10) NOT NULL AUTO_INCREMENT,
            `kd_pembelian` varchar(15) DEFAULT NULL,
            `mitra` varchar(100) DEFAULT NULL,
            `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `total` int(20) DEFAULT NULL,
            `operator` varchar(50) DEFAULT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_pengeluaran()
    {
        $q = "CREATE TABLE `tbl_pengeluaran` (
            `id` int(9) NOT NULL AUTO_INCREMENT,
            `kd_pengeluaran` varchar(20) DEFAULT NULL,
            `nama` varchar(100) DEFAULT NULL,
            `deks` text,
            `kategori` varchar(50) DEFAULT NULL,
            `total` int(20) DEFAULT NULL,
            `operator` varchar(50) DEFAULT NULL,
            `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_pesanan()
    {
        $q = "CREATE TABLE `tbl_pesanan` (
            `id` int(7) NOT NULL AUTO_INCREMENT,
            `kd_pesanan` varchar(20) NOT NULL,
            `pelanggan` varchar(111) NOT NULL,
            `tipe` varchar(50) NOT NULL,
            `jumlah_tamu` int(3) NOT NULL,
            `meja` varchar(111) DEFAULT NULL,
            `waktu_masuk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `waktu_selesai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `operator` varchar(50) NOT NULL,
            `status` varchar(50) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_promo()
    {
        $q = "CREATE TABLE `tbl_promo` (
            `id` int(4) NOT NULL AUTO_INCREMENT,
            `kd_promo` varchar(8) NOT NULL,
            `nama` varchar(111) NOT NULL,
            `deks` text NOT NULL,
            `tipe` varchar(25) NOT NULL,
            `value` int(20) NOT NULL,
            `kuota` int(5) NOT NULL,
            `tanggal_expired` date NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_setting()
    {
        $q = "CREATE TABLE `tbl_setting` (
            `id` int(3) NOT NULL AUTO_INCREMENT,
            `kd_setting` varchar(200) NOT NULL,
            `caption` varchar(111) NOT NULL,
            `deks` text NOT NULL,
            `value` varchar(255) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
        // insert default data 
        // tax 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (1,"tax","Pajak restoran","Tambahann pajak ketika pembayaran","5");');
        $this -> st -> queryRun();
        // nama resto 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (2,"nama_resto","Nama restoran","Nama Restoran","Nadha Resto");');
        $this -> st -> queryRun();
        // ip_address_print_kasir 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (3,"ip_address_print_kasir","Ip address printer kasir","Alamat ip address printer kasir","127.0.0.1");');
        $this -> st -> queryRun();
        // ip_address_print_kichen
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (4,"ip_address_print_kichen","Ip Address printer dapur","Alamat ip address printer dapur","127.0.0.1");');
        $this -> st -> queryRun(); 
        // alamat_resto 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (5,"alamat_resto","Alamat restoran","","Jln. Pantai Cermin, No. 45, Perbaungan, Serdang Bedagai");');
        $this -> st -> queryRun();
        // status_setting 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (6,"status_setting","Status Setting","-","done");');
        $this -> st -> queryRun();
        // nama_owner 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (7,"nama_owner","Nama Owner Resto","","Hasnah Nur Ardita");');
        $this -> st -> queryRun();
        // email_resto 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (8,"email_resto","Email Restoran","Alamat email restoran","hi@justhasnah.my.id");');
        $this -> st -> queryRun();
        // logo_resto 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (9,"logo_resto","Logo Restoran","","logo.png");');
        $this -> st -> queryRun();
        // awal_pembukuan 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (10,"awal_pembukuan","Tahun awal pembukuan","","2020");');
        $this -> st -> queryRun();
        // api_woo_wa 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (11,"api_woo_wa","API Key WooWa","","");');
        $this -> st -> queryRun();
        // saldo_awal 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (12,"saldo_awal","Saldo awal resto","","1000000");');
        $this -> st -> queryRun();
        // nomor_handphone 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (13,"nomor_handphone","Nomor Handphone Restoran","","082272177099");');
        $this -> st -> queryRun();
        // koneksi_printer 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (14,"koneksi_printer","Tipe koneksi printer","","USB");');
        $this -> st -> queryRun();
        // ip_address_print_other 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (15,"ip_address_print_other","Ip address print other","","127.0.0.01");');
        $this -> st -> queryRun();
        // email_host 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (16,"email_host","Email Host","Email pengiriman notifikasi ke pelanggan","");');
        $this -> st -> queryRun();
        // email_host_password 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (17,"email_host_password","Email host password","Password email untuk notifikasi ke pelanggan","");');
        $this -> st -> queryRun();
        // kode_pos 
        $this -> st -> query('INSERT INTO `tbl_setting` VALUES (18,"kode_pos","Kode Pos Resto","","20986");');
        $this -> st -> queryRun();
    }

    public function create_tbl_slider()
    {
        $q = "CREATE TABLE `tbl_slider` (
            `id` int(2) NOT NULL AUTO_INCREMENT,
            `sub_header` varchar(255) DEFAULT NULL,
            `title` varchar(255) DEFAULT NULL,
            `sub_title` varchar(255) DEFAULT NULL,
            `img` varchar(255) DEFAULT NULL,
            `cap_button` varchar(50) DEFAULT NULL,
            `link` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
        // insert default data 
        $this -> st -> query('INSERT INTO `tbl_slider` VALUES (1,"Welcome to NadhaResto","Best resto for indonesia food","Harga murah, kualitas makanan luar biasa","soto_ayam.jpg","Order now","home/selfservice");');
        $this -> st -> queryRun();
    }

    public function create_tbl_temp_pembelian_bahan_baku()
    {
        $q = "CREATE TABLE `tbl_temp_pembelian_bahan_baku` (
            `id` int(10) NOT NULL AUTO_INCREMENT,
            `kd_temp` varchar(20) DEFAULT NULL,
            `kd_pembelian` varchar(15) DEFAULT NULL,
            `kd_item` varchar(15) DEFAULT NULL,
            `qt` int(15) DEFAULT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_temp_pesanan()
    {
        $q = "CREATE TABLE `tbl_temp_pesanan` (
            `id` int(7) NOT NULL AUTO_INCREMENT,
            `id_temp` varchar(55) NOT NULL,
            `kd_pesanan` varchar(20) NOT NULL,
            `kd_menu` varchar(11) NOT NULL,
            `harga_at` int(20) NOT NULL,
            `qt` int(4) NOT NULL,
            `total` int(20) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_temp_self_service()
    {
        $q = "CREATE TABLE `tbl_temp_self_service` (
            `id` int(10) NOT NULL AUTO_INCREMENT,
            `kd_temp` varchar(15) DEFAULT NULL,
            `kd_item` varchar(10) DEFAULT NULL,
            `qt` int(3) DEFAULT NULL,
            `harga_at` int(20) DEFAULT NULL,
            `total` int(20) DEFAULT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_timeline()
    {
        $q = "CREATE TABLE `tbl_timeline` (
            `id` int(7) NOT NULL AUTO_INCREMENT,
            `id_timeline` varchar(55) NOT NULL,
            `caption` varchar(200) NOT NULL,
            `tipe` varchar(50) NOT NULL,
            `object` varchar(111) NOT NULL,
            `operator` varchar(50) NOT NULL,
            `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_transaksi()
    {
        $q = "CREATE TABLE `tbl_transaksi` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `token_transaksi` varchar(25) NOT NULL,
            `kd_transaksi` varchar(15) NOT NULL,
            `arus` varchar(10) NOT NULL,
            `total` int(20) NOT NULL,
            `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            `operator` varchar(50) NOT NULL,
            PRIMARY KEY (`id`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

    public function create_tbl_user()
    {
        $q = "CREATE TABLE `tbl_user` (
            `id` int(5) NOT NULL AUTO_INCREMENT,
            `username` varchar(111) NOT NULL,
            `nama` varchar(100) DEFAULT NULL,
            `password` varchar(111) NOT NULL,
            `tipe` varchar(11) NOT NULL,
            `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`,`username`))";
        $this -> st -> query($q);
        $this -> st -> queryRun();
        // insert default data 
        $this -> st -> query('INSERT INTO `tbl_user` VALUES (1,"admin","Nadha Resto Admin","$2y$10$QzSw1T9csavkHjJEjeYsOumM3tOrT1WKWZQPAe/4tuFSql.lYSfxq","admin","2020-09-15 23:04:53");');
        $this -> st -> queryRun();
    }

}