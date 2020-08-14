<?php

class dbMigrate extends Route{

    private $sn = 'dbMigrateData';

    public function index()
    {
        echo "<pre><h3>Database migrate - NadhaResto Apps</h3><br/>";
        echo "-> Sebelum melakukan migrasi database, pastikan path server telah di set<br/>";
        echo "-> Jangan lupa buat database sesuai dengan settingan yang telah di buat<br/>";
        echo "-> Proses akan membuat tabel, & feeder data inisialisasi secara otomatis<br/>";
        echo "-> Setelah melakukan migrate, silahkan lihat tabel di database apakah sudah ter-create atau tidak</br>";
        echo "-> Apabila proses gagal, coba periksa kembali apakah settingan path server & database sudah sesuai<br/>";
        echo "-> Apabila proses berhasil, silahkan tutup halaman ini dan kembali ke halaman awal aplikasi untuk mulai menggunakan aplikasi<br/>";
        echo "-> Silahkan kontak tim haxorsprogramming jika mengalami kendala dalam proses migrasi database";
        echo "<a href='".HOMEBASE."dbMigrate/startMigrate'><h3>Start Migrate</h3></a></pre>";
    }

    public function startMigrate()
    {
        
        $this -> state($this -> sn) -> create_tbl_arus_kas();
        $this -> state($this -> sn) -> create_tbl_bahan_baku();
        // $this -> goto('home');
    }

}