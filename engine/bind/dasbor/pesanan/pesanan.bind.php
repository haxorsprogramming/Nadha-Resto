<div id="divPesanan">
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
                            <div class="text-muted text-small"><span class="text-primary"></span> <?=$capStatus; ?></div>
                            <a href='#!' class="btn btn-sm btn-primary btn-icon icon-left <?=$sb; ?>"><i class='fas fa-sign-in-alt'></i> Pilih</a>
                        </div>
                        <?php endforeach; ?>
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

                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left"><i class='fas fa-chevron-circle-right'></i> Next (Pilih menu)</a>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/pesanan.js"></script>