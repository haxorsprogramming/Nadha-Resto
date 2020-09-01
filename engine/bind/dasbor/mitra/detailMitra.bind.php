<div class="row" id="divDetailMitra">
    <!-- INFORMASI MITRA  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header">Informasi Mitra</div>
            <div style="text-align: center;margin-bottom:15px;">
                <img src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" class="rounded-circle" style="width: 100px;">
            </div>
            <table class="table" style="width: 90%;">
                <tr>
                    <th>Nama Mitra</th>
                    <th><input type='text' id='txtNamaMitra' value="<?=$data['mitra']['nama']; ?>" class="form-control" disabled></th>
                    <input type="hidden" id="txtKdMitra" value="<?=$data['kdMitra']; ?>">
                </tr>
                <tr>
                    <th>Deks</th>
                    <th><input type='text' id='txtDeks' value="<?=$data['mitra']['deks']; ?>" class="form-control" disabled></th>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <th><input type='text' id='txtAlamat' value="<?=$data['mitra']['alamat']; ?>" class="form-control" disabled></th>
                </tr>
                <tr>
                    <th>Pemilik</th>
                    <th><input type='text' id='txtPemilik' value="<?=$data['mitra']['pemilik']; ?>" class="form-control" disabled></th>
                </tr>
                <tr>
                    <th>No Hp</th>
                    <th><input type='text' id='txtNoHp' value="<?=$data['mitra']['hp']; ?>" class="form-control" disabled></th>
                </tr>
            </table>
            <div style="text-align: center;margin-bottom:12px;">
                <a href='#!' class="btn btn-primary btn-lg btn-icon icon-left" @click='editAtc'>
                    <i :class='btnClass'></i> {{btnCap}}
                </a>&nbsp;&nbsp;&nbsp;
                <a href='#!' class="btn btn-warning btn-lg btn-icon icon-left" @click='hapusMitraAtc("<?=$data['kdMitra']; ?>")'>
                    <i class='fas fa-trash-alt'></i> Hapus Mitra
                </a>&nbsp;&nbsp;&nbsp;
                <a href='#!' class="btn btn-info btn-lg btn-icon icon-left" @click='kembaliAtc'>
                    <i class='fas fa-reply'></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <!-- STATISTIK & HISTORI MITRA  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header">Histori Transaksi Mitra</div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kd Transaksi</th>
                            <th>Total</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['historiTransaksi'] as $ht) : ?>
                            <tr>
                                <td><?=$ht['kd_pembelian']; ?></td>
                                <td>Rp. <?=number_format($ht['total']); ?></td>
                                <td><?=$ht['waktu']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailMitra.js"></script>