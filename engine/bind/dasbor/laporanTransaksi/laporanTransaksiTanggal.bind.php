<div id='divLaporanTransaksiTangggal'>
    <div style='margin-bottom:20px;'>
        <a href='<?=HOMEBASE; ?>cetak/laporanTransaksiTanggal/<?=$data['tahun'];?>/<?=$data['bulan'];?>/<?=$data['tanggal']; ?>' target="new" class="btn btn-primary btn-icon icon-left">
            <i class='fas fa-print'></i> Cetak Laporan Tanggal <?=$data['tanggalFix']; ?></a>
    </div>
    <table id='tblLaporanTanggal' class='table table-hover'>
        <thead>
            <tr>
                <th>Kd Transaksi</th>
                <th>Waktu</th>
                <th>Tipe</th>
                <th>Arus</th>
                <th>Operator</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['arusKas'] as $ak) : ?>
                <tr>
                    <td><?=$ak['kd_transaksi']; ?></td>
                    <td><?=$ak['waktu']; ?></td>
                    <td><?=$ak['tipe']; ?></td>
                    <td><?=$ak['arus']; ?></td>
                    <td><?=$ak['operator']; ?></td>
                    <td>Rp. <?=number_format($ak['total']); ?></td>
                    <td><a class="btn btn-primary btn-sm btnDetail" href="#!" data-id="<?=$ak['kd_transaksi']; ?>"><i class="fas fa-info-circle"></i> Detail</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksiTanggal.js"></script>