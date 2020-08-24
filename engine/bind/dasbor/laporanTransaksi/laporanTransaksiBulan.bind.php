<div id='divLaporanTransaksiBulan'>
    <div style='margin-bottom:20px;'>
        <a href='<?=HOMEBASE; ?>cetak/laporanTransaksiBulan/<?=$data['tahun'];?>/<?=$data['bulan'];?>' target="new" class="btn btn-primary btn-icon icon-left"><i class='fas fa-print'></i> Cetak Laporan Bulan</a>
    </div>
    <table id='tblLaporanBulan' class='table table-hover'>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Jumlah Transaksi Masuk</th>
                <th>Jumlah Transaksi Keluar</th>
                <th>Nominal Transaksi Masuk</th>
                <th>Nominal Transaksi Keluar</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $tahun = $data['tahun'];
                $bulan = $data['bulan'];
                $tHari = $data['tHari'];
                $blnToArray = $bulan - 1;
                $blnInt = $this -> getListBulanInt();
                $bulanFix = $blnInt[$blnToArray];
                for($x = 0; $x < $tHari; $x++){
                    $tglFix = $x + 1;
                    $tglToCap = $this -> getTanggalBedaDigit($tglFix);
                    $tanggalFix = $tahun."-".$bulanFix."-".$tglToCap;
                    $start = $tanggalFix." 00:00:00";
                    $finish = $tanggalFix." 23:59:59";
                    //data transaksi 
                    $jlhTransaksiMasuk = $this -> state('laporanTransaksiData') -> transaksiAwal($start, $finish, 'masuk');
                    $nominalTransaksiMasuk = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'masuk');
                    $jlhTransaksiKeluar = $this -> state('laporanTransaksiData') -> transaksiAwal($start, $finish, 'keluar');
                    $nominalTransaksiKeluar = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'keluar');
            ?>
            <tr>
                <td><?=$tglToCap; ?></td>
                <td><?=$jlhTransaksiMasuk; ?></td>
                <td><?=$jlhTransaksiKeluar; ?></td>
                <td>Rp. <?=number_format($nominalTransaksiMasuk); ?></td>
                <td>Rp. <?=number_format($nominalTransaksiKeluar); ?></td>
                <td><a href='#!' class="btn btn-primary btn-icon icon-left" @click="detailAtc('<?=$tahun; ?>', '<?=$bulanFix; ?>', '<?=$tglToCap; ?>')"><i class='far fa-file-alt'></i> Detail</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksiBulan.js"></script>