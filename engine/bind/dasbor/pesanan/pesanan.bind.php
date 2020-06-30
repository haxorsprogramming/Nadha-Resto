<div id='divPilihPesanan' style="text-align: center;">
    <h3>{{cap}}</h3>
    <div id='btnPilihPesanan'>
        <a href="#!" class="btn btn-lg btn-primary btn-icon icon-left" id='btnDineIn'>
            <i class='fas fa-utensils'></i>
            Makan di tempat (Dine in)
        </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#!" class="btn btn-lg btn-primary btn-icon icon-left" id='btnTakeHome'>
            <i class='fas fa-shopping-bag'></i>
            Bawa Pulang (Take home)
        </a>
    </div>
</div>
<div id="divPesananDineIn">
    <div class='row'>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card card-primary">
                <div class="card-header">
                    <h4>Pilih Meja</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php foreach($data['meja'] as $dm) : 
                            if($dm['status'] == 'leave'){
                                $capStatus = 'Kosong';
                                $pic = 'meja_active.png';
                                $sb = '';
                            }else{
                                $capStatus = 'Dipakai';
                                $pic = 'meja_disabled.png';
                                $sb = 'disabled';
                            }
                        ?>
                        <div class="col text-center">
                            <img src="<?=STYLEBASE; ?>/dasbor/img/<?=$pic; ?>" style="width: 80px;">
                            <div class="mt-2 font-weight-bold"><?=$dm['nama']; ?></div>
                            <div class="text-muted text-small"><span class="text-primary"></span> <?=$capStatus; ?>
                            </div>
                            <a href='#!' class="btn btn-sm btn-primary btn-icon icon-left <?=$sb; ?>" v-on:click="mejaDipilihAtc('<?=$dm['nama'];?>', '<?=$dm['kd_meja']; ?>')">
                                <i class='fas fa-sign-in-alt'></i>
                                Pilih
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="container" style="margin-top:12px;">
                        <h5>Meja Dipilih : {{mejaDipilihCap}}</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Pelanggan</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Pelanggan</label><br />
                        <select class="form-control select2" id='txtPelanggan' onchange="setPelanggan()" style="width: 100%;">
                            <option value="none" default>-- Pilih pelanggan --</option>
                            <?php foreach($data['pelanggan'] as $dp) :
                            ?>
                            <option value="<?=$dp['id_pelanggan']; ?>"><?=$dp['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Tamu</label>
                        <input type="number" class="form-control" id='txtTamu'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left"><i class='fas fa-chevron-circle-right'></i> Next
            (Pilih menu)</a>
    </div>
</div>
<div id='divPesananTakeHome'>

</div>
<script src="<?=STYLEBASE; ?>/dasbor/pesanan.js"></script>