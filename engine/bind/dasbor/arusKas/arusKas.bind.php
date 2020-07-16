<div id='divArusKas' class="row">
<table id='tblArusKas' class='table table-hover'>
        <thead>
            <tr>
                <th>No</th>
                <th>Kd Transaksi</th>
                <th>Waktu</th>
                <th>Asal</th>
                <th>Arus</th>
                <th>Total</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach($data['arusKas'] as $ak) : ?>
            <tr>
                <td><?=$no; ?></td>
                <td><?=$ak['kd_transaksi']; ?></td>
                <td></td>
                <td><?=$ak['tipe']; ?></td>
                <td></td>
                <td>Saldo awal</td>
                <td>Rp. </td>
            </tr>
            <?php $no++; endforeach; ?>
            <tr>
                <td><?=$no; ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>Saldo awal</td>
                <td>Rp. </td>
            </tr>
        </tbody>
    </table>
</div>

<script src="<?= STYLEBASE; ?>/dasbor/arusKas.js"></script>