<div id='divSliderUtama'>

    <div id='divDataSlider'>
        <div style='margin-bottom:15px;'>
            <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahSliderAtc'>
                <i class="fas fa-plus-circle"></i> Tambah Slider
            </a>
        </div>
        <div>
            <table id='tblSlider' class='table table-hover table-bordered table-stripped'>
                <thead>
                    <tr>
                        <th>Slider</th>
                        <th>Title</th>
                        <th>Cap Button</th>
                        <th>Link</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['slider'] as $ds): ?>
                    <tr>
                        <td><img src='<?=STYLEBASE; ?>/home/img/slider/<?=$ds['img']; ?>' width="170"></td>
                        <td>
                            <h5><?=$ds['title']; ?></h5><br/>
                            <?=$ds['sub_title']; ?>
                        </td>
                        <td><?=$ds['cap_button']; ?></td>
                        <td><?=$ds['link']; ?></td>
                        <td><a href='#!' class="btn btn-primary btn-icon icon-left"><i class='far fa-edit'></i> Edit</a></td>
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </div>

    <div id='divTambahSlider'>
        <div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
                <i class='fas fa-reply'></i>Kembali
            </a>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                        <label>Judul</label>
                        <input type="text" class="form-control" id='txtJudul'>
                    </div>
                    <div class="form-group">
                        <label>Sub Judul</label>
                        <input type="text" class="form-control" id='txtSubJudul'>
                    </div>
                    <div class="form-group">
                        <label>Caption Button</label>
                        <input type="text" class="form-control" id='txtCaptionButton'>
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" class="form-control" id='txtLink'>
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" class="form-control" id='txtFoto'>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                <div class="card card-primary">
                    <div class="card card-header"><h4>Preview</h4></div>
                    <div class="card card-body">
                        <div style="text-align:center;">
                            <img src="<?=STYLEBASE; ?>/home/img/slider/family_dinner.jpg" width="300">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?=STYLEBASE; ?>/dasbor/sliderUtama.js"></script>