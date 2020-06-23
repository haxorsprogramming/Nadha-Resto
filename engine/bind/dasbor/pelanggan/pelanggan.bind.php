<div id='divPelanggan'>
    <div style='margin-bottom:15px;'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPelangganAtc'><i
                class="fas fa-plus-circle"></i> Tambah Pelanggan</a>
    </div>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
        <table id='tblPelanggan' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th style="text-align: center;">Pelanggan</th>
                    <th>Alamat</th>
                    <th>Hp</th>
                    <th>Terakhir Kunjungan</th>
                    <th>Total Transaksi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['pelanggan'] as $pelanggan) : ?>
                    <tr>
                        <td><?=$pelanggan['nama']; ?></td>
                        <td><?=$pelanggan['alamat']; ?></td>
                        <td><?=$pelanggan['no_hp']; ?></td>
                        <td><?=$pelanggan['last_visit']; ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/pelanggan.js"></script>