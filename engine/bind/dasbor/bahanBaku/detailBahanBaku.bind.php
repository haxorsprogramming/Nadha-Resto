<div id='divDetailBahanBaku'>
    <div class="row">
    <!-- LIST BAHAN BAKU  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Detail Bahan Baku</h4></div>
                <div class="form-group">
                    <label>Nama Bahan Baku</label>
                    <input type="hidden" id="txtKdBahan" value="<?=$data['bahanBaku']['kd_bahan']; ?>">
                    <input type="text" class="form-control" id="txtNama" value="<?=$data['bahanBaku']['nama']; ?>" placeholder="Nama Bahan Baku" disabled>
                </div>
                <div class="form-group">
                    <label>Deksripsi</label>
                    <textarea class="form-control" style="resize: none;" id="txtDeks" disabled><?=$data['bahanBaku']['deks']; ?></textarea>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" disabled id='txtKategori'>
                        <?php foreach($data['kategori'] as $dk) : ?>
                            <?php if($data['bahanBaku']['kategori'] === $dk){ ?>
                                <option value="<?=$dk; ?>" selected><?=$dk; ?></option>
                            <?php }else{ ?>
                                <option value="<?=$dk; ?>"><?=$dk; ?></option>
                            <?php } ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Satuan</label>
                    <select class="form-control" id='txtSatuan' disabled>
                        <option value="Kg">Kg</option>
                        <option value="Liter">Liter</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Sachet">Sachet</option>
                        <option value="Dus">Dus</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="text" class="form-control" id="txtStok" value="<?=$data['bahanBaku']['stok']; ?>" placeholder="Stok" disabled>
                </div>
                <div style="margin-bottom: 15px;">
                    <a href='#!' class="btn btn-primary btn-lg btn-icon icon-left" @click='editAtc'>
                        <i :class='btnClass'></i> {{btnCap}}
                    </a>&nbsp;&nbsp;&nbsp;
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