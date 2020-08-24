<div id='divLaporanTransaksiTahun'>
    <div style='margin-bottom:20px;'>
        <a href='<?=HOMEBASE; ?>cetak/laporanTransaksiTahun/<?=$data['tahun']; ?>' target="new" class="btn btn-primary btn-icon icon-left"><i class='fas fa-print'></i> Cetak Laporan Tahun</a>
    </div>
    <table id='tblLaporanTahun' class='table table-hover'>
        <thead>
            <tr>
                <th>Bulan</th>
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
                for($x = 0; $x < 12; $x++){
                    $blnToListInt = $this -> getListBulanInt();
                    $bulanFixInt = $blnToListInt[$x];
                    $blnFilterFromX = $x + 1;
                    $blnCap = $this -> bulanIndo($bulanFixInt);
                    $jlhDay = $this -> ambilHari($blnFilterFromX);
                    //prepare data filter
                    $start =  $tahun."-".$bulanFixInt."-1 00:00:00";
                    $finish = $tahun."-".$bulanFixInt."-".$jlhDay." 23:59:59";
                    //data transaksi 
                    $jlhTransaksiMasuk = $this -> state('laporanTransaksiData') -> transaksiAwal($start, $finish, 'masuk');
                    $nominalTransaksiMasuk = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'masuk');
                    $jlhTransaksiKeluar = $this -> state('laporanTransaksiData') -> transaksiAwal($start, $finish, 'keluar');
                    $nominalTransaksiKeluar = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($start, $finish, 'keluar');
            ?>
            <tr>
                <td><?=$blnCap; ?></td>
                <td><?=$jlhTransaksiMasuk; ?></td>
                <td><?=$jlhTransaksiKeluar; ?></td>
                <td>Rp. <?=number_format($nominalTransaksiMasuk); ?></td>
                <td>Rp. <?=number_format($nominalTransaksiKeluar); ?></td>
                <td><a href='#!' class="btn btn-primary btn-icon icon-left" @click="detailAtc('<?=$tahun; ?>', '<?=$blnFilterFromX; ?>', '<?=$blnCap; ?>')"><i class='far fa-file-alt'></i> Detail</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksiTahun.js"></script>