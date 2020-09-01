<div class="row" id="divDetailPromo">
    <!-- DETAIL PROMO  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header">Detail Promo</div>
            <div class="card-body">
                <table class="table" style="width: 100%;">
                    <tr>
                        <th>Nama Promo</th>
                        <th><input type='text' id='txtNamaMitra' value="<?=$data['promo']['nama']; ?>" class="form-control" disabled></th>
                        <input type="hidden" id="txtKdMitra" value="<?=$data['kdPromo']; ?>">
                    </tr>
                    <tr>
                        <th>Deks</th>
                        <th><textarea class='form-control' style="resize: none;" disabled><?=$data['promo']['deks']; ?></textarea></th>
                    </tr>
                </table>
                <div style="text-align: center;margin-bottom:12px;">
                    <a href='#!' class="btn btn-primary btn-lg btn-icon icon-left" @click='editAtc'>
                        <i :class='btnClass'></i> {{btnCap}}
                    </a>&nbsp;&nbsp;&nbsp;
                </div>
            </div>
        </div>
    </div>
    <!-- STATISTIK PROMO  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">

    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailPromo.js"></script>