<div id='divDetailMenu'>
    <div class="row">
        <!-- DETAIL MENU  -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Detail Menu</h4>
                </div>
                <div class="card-body">
                    <div style="text-align: center;">
                        <img src="<?=STYLEBASE; ?>/dasbor/img/menu/<?=$data['dataMenu']['pic']; ?>" id='txtFoto' name='txtFoto' style="width: 300px;border-radius:20px;border:2px #959c96 solid;">
                        <div style='padding-top:10px;' id='divUploadFoto'>
                            <small>Ganti Foto</small>
                            <input type="file" id='txtFotoSrc' name='txtFotoSrc' onchange='imgPrev()' class="form-control">
                        </div>
                    </div>
                    <hr />
                    <form enctype="multipart/form-data" id='frmEditMenu'>
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <input type="text" class="form-control" id='txtNamaMenu' value="<?=$data['dataMenu']['nama']; ?>" name='txtNamaMenu' disabled>
                    </div>
                    <div class="form-group">
                        <label>Deks Menu</label>
                        <textarea class="form-control" id='txtDeksMenu' name='txtDeksMenu' disabled style="resize: none;height:100px;"><?=$data['dataMenu']['deks']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Kategori Menu</label>
                        <select class="form-control" disabled id='txtKategori' name='txtKategori'>
                            <?php foreach($data['kategori'] as $dk) : ?>
                            <?php if($dk['id'] === $data['dataMenu']['kategori']) { ?>
                            <option selected value="<?=$dk['id']; ?>"><?=$dk['nama']; ?></option>
                            <?php }else{ ?>
                            <option value="<?=$dk['id']; ?>"><?=$dk['nama']; ?></option>
                            <?php } ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Satuan</label>
                        <select class="form-control" disabled id='txtSatuan' name='txtSatuan'>
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
                        <input type="text" class="form-control" id="txtHarga" name='txtHarga' value="<?=number_format($data['dataMenu']['harga']); ?>" disabled>
                    </div>
                    <div style="text-align: center;">
                        <a href='#!' class="btn btn-primary btn-lg btn-icon icon-left" @click='editAtc'>
                            <i :class='btnClass'></i> {{btnCap}}
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='#!' class="btn btn-warning btn-lg btn-icon icon-left" @click='hapusMenuAtc("<?=$data['kdMenu']; ?>")'>
                            <i class='fas fa-trash-alt'></i> Hapus Menu
                        </a>&nbsp;&nbsp;&nbsp;
                        <a href='#!' class="btn btn-info btn-lg btn-icon icon-left" @click='kembaliAtc'>
                            <i class='fas fa-reply'></i> Kembali
                        </a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- STATISTIK MENU  -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Statistik Menu</h4>
                </div>
                <div class="card card-body">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Dipesan</h4>
                                </div>
                                <div class="card-body">
                                    10
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailMenu.js"></script>