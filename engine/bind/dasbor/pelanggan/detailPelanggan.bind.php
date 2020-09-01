<div id="divDetailPelanggan">
    <div class="row">
        <!-- DETAIL PELANGGAN  -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Detail Pelanggan</h4>
                </div>
                <div class="card-body">
                    <div style="text-align: center;">
                        <img src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" style="width: 100px;" class="rounded-circle">
                        <input type="hidden" id="txtKdPelanggan" value="<?=$data['kdPelanggan']; ?>">
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text" class="form-control" id="txtNama" placeholder="Nama Pelanggan" value="<?=$data['pelanggan']['nama']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" style="resize: none;" id="txtAlamat" disabled><?=$data['pelanggan']['alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <input type="text" class="form-control" id="txtNomorHp" placeholder="Nomor Handphone" value="<?=$data['pelanggan']['no_hp']; ?>" disabled>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="txtEmail" placeholder="Email" value="<?=$data['pelanggan']['email']; ?>" disabled>
                    </div>
                    <div style="text-align: center;">
                        <a href='#!' class="btn btn-primary btn-lg btn-icon icon-left" @click='editAtc'>
                            <i :class='btnClass'></i> {{btnCap}}
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='#!' class="btn btn-warning btn-lg btn-icon icon-left" @click='hapusPelangganAtc("<?=$data['kdPelanggan']; ?>")'>
                            <i class='fas fa-trash-alt'></i> Hapus Pelanggan
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='#!' class="btn btn-info btn-lg btn-icon icon-left" @click='kembaliAtc'>
                            <i class='fas fa-reply'></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- STATISTIK PELANGGAN  -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Statistik Pelanggan</h4>
                </div>
                <div class="card-body">
                    <!-- BAR  -->
                    <div class="row">
                        <!-- TOTAL TRANSAKSI  -->
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary">
                                        <i class="fas fa-tags"></i>
                                    </div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Total Transaksi</h4>
                                        </div>
                                        <div class="card-body">
                                            <?=$data['totalTransaksi']; ?>
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
                                            <h4>Kunjungan Terakhir</h4>
                                        </div>
                                        <div class="card-body">
                                           <?=date('d M Y', strtotime($data['pelanggan']['last_visit'])); ?>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <!-- END BAR  -->
                    <!-- HISTORY TRANSAKSI  -->
                    <div style="text-align: center;"><h6>History Transaksi Pelanggan</h6></div>
                    <div class="row">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Pesanan</th><th>Total</th><th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['historyPesanan'] as $hp) : ?>
                                    <?php 
                                        $nominalPembelian = $this -> state('pelangganData') -> getNominalPesanan($hp['kd_pesanan']);
                                    ?>
                                    <tr>
                                        <td>
                                            <small><?=strtoupper($hp['kd_pesanan']); ?></small><br/>
                                            <strong><?=$hp['tipe']; ?></strong>
                                        </td>
                                        <td>Rp. <?=number_format($nominalPembelian); ?></td>
                                        <td><?=date('d M Y', strtotime($hp['waktu_masuk'])); ?></td>
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

<script src="<?=STYLEBASE; ?>/dasbor/detailPelanggan.js"></script>