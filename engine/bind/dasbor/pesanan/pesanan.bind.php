<div id='divPesanan'>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
    <div class="form-inline">
            <div class="form-group">
                <div class="input-group mb-3" style="margin-bottom: 15px;width:300px;">
                    <input type="text" class="form-control" placeholder="Cari pesanan (kd pesanan)" id='txtPesananCari'>
                    <div class="input-group-append">
                        <button href='#!' class="btn btn-primary btn-icon iconleft" @click='cariPesananAtc'>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="input-group mb-3" style="margin-bottom: 15px;margin-left:30px;">
                <label>Ke halaman&nbsp;</label>
                    <input type="number" class="form-control" placeholder="Masukkan nomor halaman" id='txtNomorHalaman'>
                    <div class="input-group-append">
                        <button href='#!' class="btn btn-primary btn-icon iconleft" @click='toNomorHalamanAtc'>
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <table id='tblDaftarPesanan' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Pesanan</th>
                    <th>Tipe</th>
                    <th>Meja</th>
                    <th>Tamu</th>
                    <th>Waktu</th>
                    <th>Status Pembayaran</th>
                    <th>Operator</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <tr v-for='dp in dataPesanan'>
                    <td>
                        <div class="post">
                            <div class="line" v-html="dp.kdPesananCap"></div>
                        </div>
                    </td>
                    <td>
                        <div class="post">
                            <div class="line">{{dp.tipe}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="post">
                            <div class="line">{{dp.meja}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="post">
                            <div class="line">{{dp.tamu}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="post">
                            <div class="line">{{dp.pembayaran}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="post">
                            <div class="line">{{dp.status}}</div>
                        </div>
                    </td>
                    <td>
                        <div class="post">
                            <div class="line">{{dp.operator}}</div>
                        </div>
                    </td>
                    <td v-if="dp.status === 'done'">
                        <a href='#!' class="btn btn-primary btn-sm" @click='detailPesanan(dp.pesanan)'>
                            <i class='fas fa-info-circle'></i> Detail
                        </a>
                    </td>
                    <td v-else-if="dp.status === 'active'">
                    <div class="dropdown d-inline mr-2">
                      <button class="btn btn-primary dropdown-toggle btn-icon btn-sm icon-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fa-sliders-h'></i> Aksi
                      </button>
                      <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="#!" @click='updatePesanan(dp.pesanan)'>Update Pesanan</a>
                        <a class="dropdown-item" href="#!" @click='bayarPesanan(dp.pesanan)'>Bayar</a>
                        <a class="dropdown-item" href="#!" @click='batalkanPesanan(dp.pesanan)'>Batalkan Pesanan</a>
                      </div>
                    </td>
                    <td v-else>
                        <div class="post">
                            <div class="line">{{dp.operator}}</div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <i>Ditampilkan 10 dari total <?=$data['jlhPesanan']; ?> pesanan | Halaman ke - {{pageNow}} | Total
                halaman : {{pageMax}}</i>
        </div>
        <hr />
        <nav class="d-inline-block">
            <ul class="pagination mb-0">
                <li class="page-item" @click='prevAtc' id='liPrev'>
                    <a class="page-link" href="#!"><i class="fas fa-chevron-left"></i></a>
                </li>

                <li class="page-item active" v-for='h in halaman' :id="'pg'+h.no">
                    <a class="page-link" href="#!" >{{h.no}}</a>
                </li>

                <li class="page-item" @click='nextAtc' id='liNext'>
                    <a class="page-link" href="#!"><i class="fas fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav> 
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/daftarPesanan.js"></script> 