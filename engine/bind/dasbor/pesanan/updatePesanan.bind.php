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
                <div class="row">
                    <ul class="list-unstyled list-unstyled-border">

                        <li class="media" v-for='dm in dataMenu'>
                            <img class="mr-3" width="150" :src="'ladun/dasbor/img/menu/'+dm.pic">
                            <div class="media-body">
                                <div class="float-right text-primary">
                                    <a href='#!' class="btn btn-sm btn-primary"
                                        v-on:click='tambahItem(dm.kdMenu, dm.nama, dm.harga)'><i
                                            class="fas fa-plus-circle"></i></a>
                                    <a href='#!' class="btn btn-sm btn-warning" v-on:click='hapusItem(dm.kdMenu)'><i
                                            class="fas fa-trash-alt"></i></a>
                                </div>
                                <div class="media-title">{{dm.nama}}</div>
                                <span class="text-small text-muted">{{dm.deks}}</span>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        <div class="card card card-primary">
            <div class="card-header">
                <h4>Detail Pesanan</h4>
            </div>
            <div class="card-body">
                <div style="margin-bottom: 12px;">
                    <table>
                        <tr>
                            <th><code>Nomor Pesanan</code></th>
                            <th>: <code id='txtKdPesanan'><?=$data['kdPesanan']; ?></code></th>
                        </tr>
                        <tr>
                            <th><code>Nama Pelanggan</code></th>
                            <th><code>: {{namaPelanggan}}</code></th>
                        </tr>
                        <tr>
                            <th><code>Jumlah Tamu</code></th>
                            <th><code>: {{meja}}</code></th>
                        </tr>
                        <tr>
                            <th><code>Meja</code></th>
                            <th><code>: {{jlhTamu}}</code></th>
                        </tr>
                    </table>
                </div>
                <div>
                Daftar Item : 
                    <table class="table">
                        <tr>
                            <th>Menu</th>
                            <th>Harga (@)</th>
                            <th>Qt</th>
                            <th>Total</th>
                        </tr>
                        <tr v-for='mp in menuFresh'>
                            <td><strong>{{mp.namaMenu}}</strong></td>
                            <td>Rp. {{ Number(mp.hargaAt).toLocaleString() }}</td>
                            <td>{{mp.qt}}</td>
                            <td>Rp. {{ Number(mp.total).toLocaleString() }}</td>
                        </tr>
                        <tr>
                            <tr>
                                <td colspan="3"><strong style="font-size: 25px;">Total</strong></td><td>Rp. {{ Number(totalHarga).toLocaleString() }}</td>
                            </tr>
                        </tr>
                    </table>
                </div>
                <div>
                    <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='updateAtc'>
                        <i class='fas fa-check-circle'></i> Update Pesanan
                    </a>&nbsp;&nbsp;&nbsp;
                    
                    <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='kembaliAtc'>
                        <i class='fas fa-reply-all'></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/updatePesanan.js"></script>