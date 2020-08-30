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
                <div style="margin-bottom: 15px;text-align:center;">
                    <a href='#!' class="btn btn-primary btn-lg btn-icon icon-left" @click='editAtc'>
                        <i :class='btnClass'></i> {{btnCap}}
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href='#!' class="btn btn-warning btn-lg btn-icon icon-left" @click='hapusBahanBaku("<?=$data['bahanBaku']['kd_bahan']; ?>")'>
                        <i class='fas fa-trash-alt'></i> Hapus Bahan Baku
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href='#!' class="btn btn-info btn-lg btn-icon icon-left" @click='kembaliAtc'>
                        <i class='fas fa-reply'></i> Kembali
                    </a>
                </div>
        </div>
    </div>
    <!-- STATISTIK & HISTORY PEMBELIAN BAHAN BAKU  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header"><h4>Statistik Bahan Baku</h4></div>
            <div class="card-body">
                <div class="row">
                    <!-- TOTAL TRANSAKSI  -->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Total Pembelian</h4>
                                        </div>
                                        <div class="card-body">
                                            <?=$data['totalKonsumsi']; ?> <?=$data['bahanBaku']['satuan']; ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!-- NOMINAL TRANSAKSI  -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary">
                                        <i class="fas fa-address-book"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Nominal Pembelian Total</h4>
                                        </div>
                                        <div class="card-body">
                                          
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
                <!-- HISTORY PEMBELIAN  -->
                <div style="text-align: center;"><h6>History Pembelian</h6></div>
                <div class="row">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Kd Pembelian</th><th>Qt</th><th>Waktu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['historiPembelian'] as $hp) : ?>
                                <tr>
                                    <td><?=strtoupper($hp['kd_pembelian']); ?></td>
                                    <td><?=$hp['qt']; ?> <?=$data['bahanBaku']['satuan']; ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailBahanBaku.js"></script>