<div id='divMitra'>
    <div id='divListMitra'>
    <div style='margin-bottom:15px;'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahMitraAtc'><i
                class="fas fa-plus-circle"></i> Tambah Mitra</a>
    </div>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
        <table id='tblMitra' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Mitra</th>
                    <th>Pemilik</th>
                    <th>Alamat</th>
                    <th>No. Hp</th>
                    <th>Tipe</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
               <?php foreach($data['mitra'] as $dm) : ?>
                <tr>
                    <td><span style="font-size:20px;"><?=$dm['nama']; ?></span></td>
                    <td><?=$dm['pemilik']; ?></td>
                    <td><?=$dm['alamat']; ?></td>
                    <td><?=$dm['hp']; ?></td>
                    <td><?=$dm['tipe']; ?></td>
                    <td><a href='#!' class="btn btn-primary btn-icon icon-left">Edit</a></td>
                </tr>
               <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    </div>
    <div id='divTambahMitra'>
                
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/mitra.js"></script>