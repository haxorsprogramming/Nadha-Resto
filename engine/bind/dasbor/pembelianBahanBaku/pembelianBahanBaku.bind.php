<div id='divPembelian'>
    <div id='historyPembelian'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahPembelianAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Pembelian
        </a>
        <div style="margin-top: 20px;">
        <table id='tblHistoryPembelian' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Kd Pembelian</th>
                    <th>Mitra</th>
                    <th>Total</th>
                    <th>Waktu</th>
                    <th></th>
                </tr>
            </thead>
        </table>
        </div>
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
                <div class="card-body">
                    <h6>List item</h6>
                    <div class="form-group">
                        <label>Mitra</label>
                        <select class="form-control select2" id='txtMitra' onchange="setMitra()" style="width: 100%;">
                            <option value="none" default>-- Pilih pemasok --</option>
                            <?php foreach($data['mitra'] as $dp) :
                            ?>
                            <option value="<?=$dp['kd_mitra']; ?>"><?=$dp['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <table class="table">
                        <tr>
                            <th>Item</th><th>Quantity</th>
                        </tr>
                        <tr v-for='ip in itemDipilih'>
                            <td>{{ip.nama}}</td><td>{{ip.value}} {{ip.satuan}}</td>
                        </tr>
                    </table>
                    <div>
                        <hr/>                        
                      <div class="form-group">
                        <label for='nominal'>Nominal Pembelian</label>&nbsp;&nbsp;&nbsp;
                        <input type="text" name="nominal" id='txtNominal' class="form-control" style="width: 200px;" maxlength="20">
                      </div>
                    <div>
                        <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" id='btnProses' @click='prosesAtc'><i class='fas fa-check-circle'></i> Proses</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
                <div class="card-header">
                <h5>List Bahan Baku</h5>
                </div>
                <div class="card-body">
                <div class="form-group">
                <label>Kategori bahan baku</label>
                <select class="form-control" id='txtKategori' onchange="setKategori()">
                    <option value="none">-- Pilih kategori --</option>
                    <option value="Daging">Daging</option>
                    <option value="Seafood">Seafood</option>
                    <option value="Karbo">Karbo</option>
                    <option value="Sayur">Sayur</option>
                    <option value="Buah">Buah</option>
                    <option value="Mie Instan">Mie Instan</option>
                    <option value="Bumbu">Bumbu</option>
                    <option value="Fast Food">Fast food</option>
                    <option value="Tepung">Tepung</option>
                    <option value="Lain Lain">Lain lain</option>
                </select>
            </div>
            <div>
                <table class="table" id='tblListBahan'>
                    <thead>
                        <tr>
                            <th>Bahan</th><th>Qt</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for='ibb in itemBahanBaku'>
                            <td>{{ibb.nama}}</td>
                            <td>
                                <div class="row">
                                    <input type="number" v-bind:id='ibb.kdBahan' class="form-control form-control-sm txtNilai" style="width: 100px;">&nbsp;&nbsp;{{ibb.satuan}}
                                </div>
                            </td>
                            <td>
                                <a href='#!' class="btn btn-sm btn-icon btn-primary icon-left" @click='tambahItemAtc(ibb.kdBahan, ibb.satuan, ibb.nama)'>
                                    <i class="fas fa-plus-circle"></i> Set
                                </a>&nbsp;&nbsp;
                                <a href='#!' class="btn btn-sm btn-icon btn-warning icon-left" @click='hapusItemAtc(ibb.kdBahan)'>
                                    <i class="fas fa-minus-circle"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/pembelianBahanBaku.js"></script>