<div id='divPromo'>
<div id='divDataPromo'>
    <div style='margin-bottom:15px;'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click=''>
            <i class="fas fa-plus-circle"></i> Tambah Promo
        </a>
    </div>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
        <table id='tblPromo' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Promo</th>
                    <th>Deks</th>
                    <th>Tipe / Nilai</th>
                    <th>Status / Kuota</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['promo'] as $dp) : ?>
                    <tr>
                        <td><?=$dp['nama']; ?></td>
                        <td><?=$dp['deks']; ?></td>
                        <td><?=$dp['tipe']; ?> / <?=$dp['value']; ?></td>
                        <td><?=$dp['status']; ?> / <?=$dp['kuota']; ?></td>
                        <td><a href='#!' class="btn btn-primary">Detail</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<div id='divTambaPromo'>
<div>
        <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click=''><i class='fas fa-reply'></i> Kembali</a>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                <label>Nama Meja</label>
                <input type="text" class="form-control" id='txtNamaMeja'>
            </div>
            <div class="form-group">
                <label>Deks</label>
                <input type="text" class="form-control" id='txtDeks'>
            </div>
            <div>
                <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" id='btnSimpan'><i class='fas fa-save'></i>Simpan</a>
                &nbsp;&nbsp;
                <a href='#!' class="btn btn-lg btn-info btn-icon icon-left" id='btnClearForm'><i class='fas fa-i-cursor'></i> Clear</a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card-primary">
                <div class="card-header">
                <h4 class="card-title">Tentang manajemen meja</h4>
                </div>
                <div class="card-body">
                    <ul>
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/promo.js"></script> 