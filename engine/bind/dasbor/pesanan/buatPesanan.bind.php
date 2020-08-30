<div id='divPilihPesanan' style="text-align: center;">
    <h3>{{cap}}</h3>
    <div id='btnPilihPesanan'>
        <a href="#!" class="btn btn-lg btn-primary btn-icon icon-left" id='btnDineIn'>
            <i class='fas fa-utensils'></i> Makan di tempat (Dine in)
        </a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#!" class="btn btn-lg btn-primary btn-icon icon-left" id='btnTakeHome'>
            <i class='fas fa-shopping-bag'></i>Bawa Pulang (Take home)
        </a>
    </div>
    <div class="row" id='divGambarPenggoda'>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <img src="<?=STYLEBASE; ?>/dasbor/img/menu-sample-burgers.jpg" style="border-radius: 12px;">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <img src="<?=STYLEBASE; ?>/dasbor/img/menu-sample-pasta.jpg" style="border-radius: 12px;">
        </div>
    </div>
</div>

<!-- PESANAN DINE IN AREA -->

<div id="divPesananDineIn">
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
                        <div class="col text-center" style="margin-top: 15px;">
                            <img src="<?=STYLEBASE; ?>/dasbor/img/<?=$pic; ?>" style="width: 80px;">
                            <div class="mt-2 font-weight-bold"><?=$dm['nama']; ?></div>
                            <div class="text-muted text-small"><span class="text-primary"></span> <?=$capStatus; ?>
                            </div>
                            <a href='#!' class="btn btn-sm btn-primary btn-icon icon-left <?=$sb; ?>" v-on:click="mejaDipilihAtc('<?=$dm['nama'];?>', '<?=$dm['kd_meja']; ?>')">
                                <i class='fas fa-sign-in-alt'></i>Pilih
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="container" style="margin-top:12px;text-align:center;">
                        <h5>Meja Dipilih : {{mejaDipilihCap}}</h5>
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
                    <div class="form-group">
                        <label>Nama Pelanggan</label><br />
                        <select class="form-control select2" id='txtPelanggan' onchange="setPelanggan()"
                            style="width: 100%;">
                            <option value="none" default>-- Pilih pelanggan --</option>
                            <?php foreach($data['pelanggan'] as $dp) :
                            ?>
                            <option value="<?=$dp['id_pelanggan']; ?>-<?=$dp['nama']; ?>"><?=$dp['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Tamu</label>
                        <input type="number" class="form-control" id='txtJlhTamu'>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="text-align: center;">
        <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" v-on:click='pilihMenuAtc'>
            <i class='fas fa-chevron-circle-right'></i>Next (Pilih menu)
        </a>
    </div>
</div>

<!-- PESANAN TAKE HOME AREA -->

<div id='divPesananTakeHome' class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Pelanggan</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nama Pelanggan</label><br />
                    <select class="form-control select2" id='txtPelangganTh' onchange="setNamaPelangganTh()" style="width: 100%;">
                        <option value="none" default>-- Pilih pelanggan --</option>
                        <?php foreach($data['pelanggan'] as $dp) :
                            ?>
                        <option value="<?=$dp['id_pelanggan']; ?>-<?=$dp['nama']; ?>"><?=$dp['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">

                </div>
                <hr />
                <h4> Daftar Item :</h4>
                <table class="table">
                    <tr>
                        <th>Menu</th>
                        <th>Harga (@)</th>
                        <th>Qt</th>
                        <th>Total</th>
                    </tr>
                    <tr v-for='mp in daftarItem'>
                        <td><strong>{{mp.namaMenu}}</strong></td>
                        <td>Rp. {{ Number(mp.harga).toLocaleString() }}</td>
                        <td>{{mp.qt}}</td>
                        <td>Rp. {{ Number(mp.total).toLocaleString() }}</td>
                    </tr>
                    <tr>
                    <tr>
                        <td colspan="3"><strong style="font-size: 25px;">Total</strong></td>
                        <td>Rp. {{ Number(totalHarga).toLocaleString() }}</td>
                    </tr>
                    </tr>
                </table>
                <div>
                    <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" @click='prosesPesanan'>
                        <i class='fas fa-check-circle'></i> Proses Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
        <div class="card card card-primary">
            <div class="card-header">
                <h4>Pilih Menu</h4>
            </div>
            <div class="card-body">
                <div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" id='txtKategoriTh' onchange="setMenuTakeHome()">
                            <option value="none">--- Pilih kategori menu ---</option>
                            <?php foreach($data['kategori'] as $dk) : ?>
                            <option value="<?=$dk['id']; ?>"><?=$dk['nama']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media" v-for='dm in menuDipilih'>
                            <img class="mr-3" width="150" :src="'ladun/dasbor/img/menu/'+dm.pic">
                            <div class="media-body">
                                <div class="float-right text-primary">
                                    <a href='#!' class="btn btn-sm btn-primary" v-on:click='tambahItem(dm.kdMenu, dm.nama, dm.harga)'>
                                        <i class="fas fa-plus-circle"></i>
                                    </a>
                                    <a href='#!' class="btn btn-sm btn-warning" v-on:click='hapusItem(dm.kdMenu)'>
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </div>
                                <div class="media-title">{{dm.nama}} <br />
                                    <span class="badge badge-info">Rp. {{ Number(dm.harga).toLocaleString() }}</span>
                                </div>
                                <span class="text-small text-muted">{{dm.deks}}</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MENU CHECKOUT AREA -->

<div id='divMenuCheckout'>
    <div class='row'>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="card card card-primary">
                <div class="card-header">
                    <h4>Pilih Menu</h4>
                </div>
                <div class="card-body">
                    <div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" id='txtKategori' onchange="setMenuKategori()">
                                <option value="none">--- Pilih kategori menu ---</option>
                                <?php foreach($data['kategori'] as $dk) : ?>
                                <option value="<?=$dk['id']; ?>"><?=$dk['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <ul class="list-unstyled list-unstyled-border">

                            <li class="media" v-for='dm in dataMenu'>
                                <img class="mr-3" width="150" :src="'ladun/dasbor/img/menu/'+dm.pic">
                                <div class="media-body">
                                    <div class="float-right text-primary">
                                        <a href='#!' class="btn btn-sm btn-primary" v-on:click='tambahItem(dm.kdMenu, dm.nama, dm.harga)'>
                                            <i class="fas fa-plus-circle"></i>
                                        </a>
                                        <a href='#!' class="btn btn-sm btn-warning" v-on:click='hapusItem(dm.kdMenu)'>
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </div>
                                    <div class="media-title">{{dm.nama}}<br />
                                        <span class="badge badge-info">Rp.
                                            {{ Number(dm.harga).toLocaleString() }}</span>
                                    </div>
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
                    <h4>Detail Pesanan & Checkout</h4>
                </div>
                <div class="card-body">
                    <div style="margin-bottom: 12px;">
                        <table>
                            <tr>
                                <th><code>Nomor Pesanan</code></th>
                                <th><code>: Nomor Pesanan</code></th>
                            </tr>
                            <tr>
                                <th><code>Nama Pelanggan</code></th>
                                <th><code>: {{pelanggan}}</code></th>
                            </tr>
                            <tr>
                                <th><code>Jumlah Tamu</code></th>
                                <th><code>: {{jlhTamu}}</code></th>
                            </tr>
                            <tr>
                                <th><code>Meja</code></th>
                                <th><code>: {{mejaCap}}</code></th>
                            </tr>
                        </table>
                    </div>
                    <div class="row">
                        Daftar Item :
                        <table class="table">
                            <tr>
                                <th>Menu</th>
                                <th>Harga (@)</th>
                                <th>Qt</th>
                                <th>Total</th>
                            </tr>
                            <tr v-for='mp in menuDipilih'>
                                <td><strong>{{mp.namaMenu}}</strong></td>
                                <td>Rp. {{ Number(mp.harga).toLocaleString() }}</td>
                                <td>{{mp.qt}}</td>
                                <td>Rp. {{ Number(mp.total).toLocaleString() }}</td>
                            </tr>
                            <tr>
                            <tr>
                                <td colspan="3"><strong style="font-size: 25px;">Total</strong></td>
                                <td>Rp. {{ Number(totalHarga).toLocaleString() }}</td>
                            </tr>
                            </tr>
                        </table>
                        <div>
                            <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='bayarAtc'>
                                <i class='fas fa-check-circle'></i> Proses Pesanan
                            </a>&nbsp;&nbsp;&nbsp;
                            <a href='#!' class="btn btn-primary btn-icon icon-left">
                                <i class='fas fa-share-square'></i>Batal
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/pesanan.js"></script>