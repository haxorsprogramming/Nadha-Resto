<div id='divBantuan'>
    <!-- CHART STAGE 1 -->
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header"><h4>Menu Terlaris</h4></div>
                <div class="card-body">
                    <div id="menuTerlarisChart">Memuat chart...</div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header"><h4>Pemesanan berdasarkan tipe</h4></div>
                <div class="card-body">
                    <div id="tipePemesananChart">Memuat chart...</div>
                </div>
            </div>
        </div>
    </div>
    <!-- CHART STAGE 2 -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card card-primary">
                <div class="card-header"><h4>Pemasukan Harian (<?=$data['bulanIndo']; ?> <?=date('Y'); ?>)</h4></div>
                <div class="card-body">
                    <div id="pemasukanHarianChart" style="width:100%;height:400px;">Memuat chart...</div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="<?=STYLEBASE; ?>/dasbor/statistik.js"></script> 