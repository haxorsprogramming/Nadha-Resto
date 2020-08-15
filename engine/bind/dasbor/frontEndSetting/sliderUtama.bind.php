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
                    </tr>
                    <?php endforeach; ?> 
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="<?=STYLEBASE; ?>/dasbor/sliderUtama.js"></script>