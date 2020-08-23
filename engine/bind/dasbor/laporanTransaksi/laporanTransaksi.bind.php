<div id='divLaporanTransaksi'>
    <table id='tblLaporanTahun' class='table table-hover'>
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
                    //transaksi masuk
                    $tahun = $x;
                    $thnAwalFormat = $tahun."-01-01 00:00:00";
                    $thnAkhirFormat =  $tahun."-12-31 23:59:59";
                    $jumlahTransaksiMasukTahun = $this -> state('laporanTransaksiData') -> transaksiMasukTahun($thnAwalFormat, $thnAkhirFormat);
                    $nominalTransaksiMasuk = $this -> state('laporanTransaksiData') -> nominalTransaksiMasukTahun($thnAwalFormat, $thnAkhirFormat);
            ?> 
            <tr>
                <td><?=$x; ?></td>
                <td><?=$jumlahTransaksiMasukTahun; ?></td>
                <td></td>
                <td>Rp. <?=number_format($nominalTransaksiMasuk); ?></td>
                <td></td>
                <td><a href='#!' class="btn btn-primary btn-icon icon-left">Detail</a></td>
            </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksi.js"></script>