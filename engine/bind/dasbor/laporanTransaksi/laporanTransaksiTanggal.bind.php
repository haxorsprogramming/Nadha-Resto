<div id='divLaporanTransaksiTangggal'>
    <div style='margin-bottom:20px;'>
        <a href='<?=HOMEBASE; ?>cetak/laporanTransaksiTanggal/<?=$data['tahun'];?>/<?=$data['bulan'];?>/<?=$data['tanggal']; ?>' target="new" class="btn btn-primary btn-icon icon-left">
            <i class='fas fa-print'></i> Cetak Laporan Tanggal</a>
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
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/laporanTransaksiTanggal.js"></script>