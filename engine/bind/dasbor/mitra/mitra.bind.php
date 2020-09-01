<div id='divMitra'>
    <div id='divListMitra'>
        <div style='margin-bottom:15px;'>
            <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahMitraAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Mitra</a>
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
                        <td>
                            <a href='#!' class="btn btn-primary btn-icon icon-left" @click='detailAtc("<?=$dm['kd_mitra']; ?>")'>
                                <i class='fas fa-info-circle'></i>Detail
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id='divTambahMitra'>
        <div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
                <i class='fas fa-reply'></i> Kembali
            </a>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                <label>Nama Mitra</label>
                <input type="text" class="form-control" v-model='nama' id='txtNamaMitra'>
            </div>
            <div class="form-group">
                <label>Deks</label>
                <textarea class="form-control" style="resize: none;" v-model='deks'></textarea>
            </div>
            <div class="form-group">
                <label>Nama Pemilik</label>
                <input type="text" class="form-control" v-model='pemilik'>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" style="resize: none;" v-model='alamat'></textarea>
            </div>
            <div class="form-group">
                <label>Nomor Handphone</label>
                <input type="number" class="form-control" v-model='hp'>
            </div>
            <div class="form-group">
                <label>Tipe</label>
                <select class="form-control" v-model='tipe'>
                    <option value="pemasok">Pemasok bahan baku</option>
                    <option value="katering">Mitra Katering</option>
                </select>
            </div>
            <div>
                <a href='#!' class="btn btn-primary btn-icon icon-left" @click='simpanAtc'>
                    <i class='fas fa-save'></i> Simpan
                </a>&nbsp;&nbsp;
                <a href='#!' class="btn btn-info btn-icon icon-left" @click='clearAtc'>
                    <i class='fas fa-i-cursor'></i> Clear
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/mitra.js"></script>