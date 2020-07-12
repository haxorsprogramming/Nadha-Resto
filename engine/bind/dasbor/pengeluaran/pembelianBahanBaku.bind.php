<div id='divPembelian'>
    <div id='historyPembelian'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahPembelianAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Pembelian
        </a>
    </div>
    <div id='pembelianBaru'>
        <a href='#!' class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
            <i class='fas fa-reply'></i>Kembali
        </a>
        <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card-primary">
                <div class="card-header">
                    <h5>Detail Pembelian</h5>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
                <div class="card-header">
                <h5>Item Pembelian</h5>
                </div>
                <div class="card-body">
                <div class="form-group">
                <label>Kategori bahan baku</label>
                <select class="form-control">
                    <option value="Olahan Hewan">Daging</option>
                    <option value="Olahan Hewan">Seafood</option>
                    <option value="Karbo">Karbo</option>
                    <option value="Sayur">Sayur</option>
                    <option value="Buah">Buah</option>
                    <option value="Mie Instan">Mie Instan</option>
                    <option value="Bumbu">Bumbu</option>
                    <option value="Fast Food">Fast food</option>
                    <option value="Tepung">Tepung</option>
                    <option value="lainlain">Lain lain</option>
                </select>
            </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/pembelianBahanBaku.js"></script>