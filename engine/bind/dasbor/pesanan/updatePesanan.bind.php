<div class="row" id='divUpdatePesanan'>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        <div class="card card card-primary">
            <div class="card-header">
                <h4>Pilih Menu</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" id='txtKategori' onchange="setMenuKategori()">
                        <option value="none">--- Pilih kategori menu ---</option>
                        <option v-for='dk in dataKategori' :value='dk.kd'>{{dk.nama}}</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="">

    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/updatePesanan.js"></script> 