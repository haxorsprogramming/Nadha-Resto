<div id='divPesanan'>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
        <table id='tblDaftarPesanan' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Kd Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Tipe</th>
                    <th>Tamu</th>
                    <th>Waktu</th>
                    <th>Operator</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['daftarPesanan'] as $dp) : ?>
                    <tr>
                    <td><?=$dp['kd_pesanan']; ?></td>
                    <td><?=$dp['pelanggan']; ?></td>
                    <td><?=$dp['tipe']; ?></td>
                    <td><?=$dp['jumlah_tamu']; ?></td>
                    <td>Masuk : <br/>Keluar : </td>
                    <td><?=$dp['operator']; ?></td>
                    <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/daftarPesanan.js"></script> 