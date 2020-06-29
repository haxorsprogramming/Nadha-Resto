<div id='divMeja'>
    <div style='margin-bottom:15px;'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click=''>
            <i class="fas fa-plus-circle"></i> Tambah Meja
        </a>
    </div>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
        <table id='tblMeja' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Meja</th>
                    <th>Deks</th>
                    <th>Status</th>
                    <th>Terakhir dikunjungi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               <?php foreach($data['meja'] as $dm) : ?>
                <tr>
                    <td><?=$dm['nama']; ?></td>
                    <td><?=$dm['deks']; ?></td>
                    <td><?=$dm['status']; ?></td>
                    <td><?=$dm['last_visit']; ?></td>
                    <td><a href='#!' class="btn btn-primary">Detail</a></td>
                </tr>
               <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/meja.js"></script> 