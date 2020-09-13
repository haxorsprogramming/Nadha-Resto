<div id='divBeranda'>
    <div class="container">
        <!-- Statistik Bar -->
        <div class='row'>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-nadha-primary">
                        <i class="fas fa-water"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>{{pengunjung}}</h3>
                            <h4>Pengunjung</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-nadha-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>{{pelanggan}}</h3>
                            <h4>Pelanggan</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-nadha-primary">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>{{profit}}</h3>
                            <h4>Rasio Profit</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-nadha-primary">
                        <i class="fas fa-donate"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h3>{{transaksi}}</h3>
                            <h4>Transaksi Harian</h4>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Card layanan / menu terlaris  -->
    <div class='row'>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Menu Terlaris</h4>
                    <div class="card-header-action">
                        <a href="#!" class="btn btn-primary" @click='menuShowAtc'>Semua</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media" v-for='mv in menuFavorit'>
                            <img class="mr-3" width="170" style="border-radius:6px;" :src="'<?=STYLEBASE; ?>/dasbor/img/menu/'+mv.pic" alt="avatar">
                            <div class="media-body">
                                <div class="media-title">{{mv.judul}}</div>
                                <span class="text-small text-muted">
                                    {{mv.deks}}
                                </span><br />
                                <strong>Dipesan {{mv.total_dipesan}} kali</strong>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Transaksi terakhir -->
        <div class="col-lg-6 col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="d-inline">Pesanan terakhir</h4>
                    <div class="card-header-action">
                        <a href="#!" class="btn btn-primary" @click='pesananTerakhirShowAtc'>Semua</a>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                        <li class="media" v-for='lt in lastTs'>
                            <a href="#">
                                <img class="mr-3 rounded" width="50" src="<?=STYLEBASE; ?>/dasbor/img/avatar-1.png" alt="product">
                            </a>
                            <div class="media-body">
                                <div class="media-right">Rp. {{ Number(lt.total).toLocaleString() }}</div>
                                <div class="media-title"><a href="#!" @click='detailPesananAtc(lt.kdPesanan)'>{{lt.namaPelanggan}}</a></div>
                                <div class="text-muted text-small">Dine in <a href="#"></a>
                                    <div class="bullet"></div> {{lt.waktu}}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/beranda.js"></script>