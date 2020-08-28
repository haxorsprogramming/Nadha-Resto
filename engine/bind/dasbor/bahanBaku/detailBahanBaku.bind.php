<div id='divDetailBahanBaku'>
    <div class="row">
    <!-- LIST BAHAN BAKU  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Detail Bahan Baku</h4></div>
                <div class="form-group">
                    <label>Nama Bahan Baku</label>
                    <input type="text" class="form-control" id="txtNama" value="<?=$data['bahanBaku']['nama']; ?>" placeholder="Nama Bahan Baku" disabled>
                </div>
                <div class="form-group">
                    <label>Deksripsi</label>
                    <textarea class="form-control" style="resize: none;" id="txtDeksripsi" disabled><?=$data['bahanBaku']['deks']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    
                </div>
                <div class="form-group">
                    <label>Satuan</label>
                    
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" id="txtStok" value="<?=$data['bahanBaku']['stok']; ?>" placeholder="Stok" disabled>
                </div>
        </div>
    </div>
    <!-- HISTORY PEMBELIAN BAHAN BAKU  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Histori Pembelian</h4></div>
        </div>
    </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailBahanBaku.js"></script>