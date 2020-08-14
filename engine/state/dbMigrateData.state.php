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
            PRIMARY KEY (`id`)
          )";
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
            PRIMARY KEY (`id`)
          )";
        $this -> st -> query($q);
        $this -> st -> queryRun();
    }

}