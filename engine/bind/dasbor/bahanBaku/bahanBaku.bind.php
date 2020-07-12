<div>
<div id='divBahanBaku'>
    <div style='margin-bottom:15px;'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahBahanBakuAtc'><i
                class="fas fa-plus-circle"></i> Tambah Bahan Baku</a>
    </div>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
        <table id='tblBahanBakuAtc' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Bahan Baku</th>
                    <th>Deks</th>
                    <th>Kategori / Satuan</th>
                    <th>Stok</th>
                    <th>Total Pembelian</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['bahanBaku'] as $bb) : ?>
                <tr>
                    <td><strong><?=$bb['nama']; ?></strong></td>
                    <td><?=$bb['deks']; ?></td>
                    <td><?=$bb['kategori']; ?></td>
                    <td><?=$bb['stok']; ?> <?=$bb['satuan']; ?></td>
                    <td></td>
                    <td><a href='#!' class="btn btn-primary btn-icon btn-sm icon-left">Edit</a></td>
                </tr>
                <?php 
                    endforeach; 
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id='divTambahBahanBaku'>
    <div>
        <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='kembaliAtc'><i class='fas fa-reply'></i>
            Kembali</a>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                <label>Nama Bahan</label>
                <input type="text" class="form-control" id='txtNamaBahan'>
            </div>
            <div class="form-group">
                <label>Deks</label>
                <textarea placeholder="Deksripsi bahan baku" id='txtDeks' class="form-control" style="resize:none;"></textarea>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control">
                    <option>Karbo</option>
                    <option>Sayur</option>
                    <option>Buah</option>
                    <option>Bumbu</option>
                    <option>Fast food</option>
                </select>
            </div>
            <div class="form-group">
                <label>Satuan</label>
                
            </div>
            <div class="form-group">
                <label>Stok Awal</label>
                <input type="number" class="form-control" id='txtStokAwal'>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        </div>
    </div>
</div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/bahanBaku.js"></script>