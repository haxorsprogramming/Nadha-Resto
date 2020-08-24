<div id='divDetailMenu'>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Detail Menu</h4>
                </div>
                <div class="card-body">
                    <div style="text-align: center;">
                        <img src="<?=STYLEBASE; ?>/dasbor/img/menu/pic_contoh.jpg" style="width: 300px;border-radius:20px;border:2px #959c96 solid;">
                    </div>
                    <hr/>
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" class="form-control" id='txtNamaMenu' value="<?=$data['dataMenu']['nama']; ?>" name='txtNamaMenu' disabled>
                    </div>
                    <div class="form-group">
                        <label>Deks Menu</label>
                        <textarea class="form-control" disabled style="resize: none;height:100px;"><?=$data['dataMenu']['deks']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kategori Menu</label>
                        <select class="form-control" disabled>
                            <?php foreach($data['kategori'] as $dk) : ?>
                                <?php if($dk['id'] === $data['dataMenu']['kategori']) { ?>
                                    <option selected><?=$dk['nama']; ?></option>
                                <?php }else{ ?>
                                    <option><?=$dk['nama']; ?></option>
                                <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control" disabled>
                            <?php for($x = 0; $x < 3; $x++){ ?>
                                <?php if($data['satuan'][$x] === $data['dataMenu']['satuan']){ ?>
                                    <option selected><?=$data['satuan'][$x]; ?></option>
                                <?php }else{ ?>
                                    <option><?=$data['satuan'][$x]; ?></option> 
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailMenu.js"></script> 