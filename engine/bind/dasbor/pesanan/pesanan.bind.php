<div id='divPesanan'>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
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
            <!-- {pesanan : '', tipe : '', meja : '', tamu : '', waktu : '', pembayaran : '', pelanggan : ''} -->
                    <td>
                        <div class="post">
                            <div class="line nama"><span style="font-size:13px;">{{dp.kdPesananCap}}</span><br/>{{dp.pelanggan}} </div>
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
                    <td>
                        <a href='#!' class="btn btn-primary btn-sm">
                            <i class='fas fa-info-circle'></i> Detail
                        </a>
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