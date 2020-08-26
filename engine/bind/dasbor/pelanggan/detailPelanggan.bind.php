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
                </div>
            </div>
        </div>
        <!-- STATISTIK PELANGGAN  -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Statistik Pelanggan</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailPelanggan.js"></script>