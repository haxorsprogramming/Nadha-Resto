<div id='divLaporanTransaksiAwal'>
    <table id='tblLaporanAwal' class='table table-hover'>
        <thead>
            <tr>
                <th>Tahun</th>
                <th>Jumlah Transaksi Masuk</th>
                <th>Jumlah Transaksi Keluar</th>
                <th>Nominal Transaksi Masuk</th>
                <th>Nominal Transaksi Keluar</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $tahunAkhir = $data['tahunAwal'] + 10;

                for($x = $data['tahunAwal']; $x <= $tahunAkhir; $x++){
                    $tahun = $x;
                    $thnAwalFormat = $tahun."-01-01 00:00:00";
                    $thnAkhirFormat =  $tahun."-12-31 23:59:59";
                    //transaksi masuk
                    $jumlahTransaksiMasukAwal = $this -> state('laporanTransaksiData') -> transaksiAwal($thnAwalFormat, $thnAkhirFormat, 'masuk');
                    $nominalTransaksiMasukAwal = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($thnAwalFormat, $thnAkhirFormat, 'masuk');
                    //transaksi keluar
                    $jumlahTransaksiKeluarAwal = $this -> state('laporanTransaksiData') -> transaksiAwal($thnAwalFormat, $thnAkhirFormat, 'keluar');
                    $nominalTransaksiKeluarAwal = $this -> state('laporanTransaksiData') -> nominalTransaksiAwal($thnAwalFormat, $thnAkhirFormat, 'keluar');
            ?> 
            <tr>
                <td><?=$x; ?></td>
                <td><?=$jumlahTransaksiMasukAwal; ?></td>
                <td><?=$jumlahTransaksiKeluarAwal; ?></td>
                <td>Rp. <?=number_format($nominalTransaksiMasukAwal); ?></td>
                <td>Rp. <?=number_format($nominalTransaksiKeluarAwal); ?></td>
                <td><a href='#!' class="btn btn-primary btn-icon icon-left" @click="detailAtc('<?=$x; ?>')"><i class='far fa-file-alt'></i> Detail</a></td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksiAwal.js"></script>