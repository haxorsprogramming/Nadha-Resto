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
      <h3 id='capTotalUji'></h3>
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
          <h3 id='capTotalGejala'></h3>
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
          <i class="	fas fa-chart-line"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
        <h3 id='capTotalGejala'>%</h3>
            <h4>Rasio Kunjungan</h4>
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
          <h3 id='capTotalUji'>51</h3>
            <h4>Transaksi Harian</h4>
          </div>
          <div class="card-body">

          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
<!-- Card layanan / service terlaris  -->
  <div class='row'>
  <div class="col-lg-6 col-md-6 col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Menu Terlaris</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Semua</a>
                  </div>
                </div>
                <div class="card-body">
                <ul class="list-unstyled list-unstyled-border">
                    <li class="media" v-for='mv in menuFavorit'>
                      <img class="mr-3" width="220" style="border-radius:6px;" :src="'<?=STYLEBASE; ?>/dasbor/img/menu/'+mv.pic" alt="avatar">
                      <div class="media-body">
                        <div class="float-right text-primary">Detail</div>
                        <div class="media-title">Nasi Goreng</div>
                        <span class="text-small text-muted">
                          Nasi goreng spesial dengan bumbu tradisional
                        </span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
        </div>
        <!-- Pelanggan teraktif -->
        <div class="col-lg-6 col-md-6 col-12">
        <div class="card">
                <div class="card-header">
                  <h4 class="d-inline">Transaksi terakhir</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">Semua</a>
                  </div>
                </div>
                <div class="card-body">
                
                </div>
              </div>
        </div>
</div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/beranda.js"></script>
