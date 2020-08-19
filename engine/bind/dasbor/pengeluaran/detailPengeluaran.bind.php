<section class="section" id='divDetailPembelianBb'>
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h3>Invoice Pengeluaran</h3>
                            <div class="invoice-number">Service Id # <span id='txtKdPembelian'><?=strtoupper($data['kdTransaksi']); ?></div>
                            <span id='txtKodeService' style='display:none;'></span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Kategori </strong><br>
                                    <br>
                                    <?=$data['pengeluaran']['kategori']; ?><br>
                                    <br>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Operator </strong><br>
                                    <br>
                                    <?=$data['pengeluaran']['operator']; ?><br>
                                    <br> 
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Tanggal Transaksi</strong>
                                    <br>
                                    <?=$data['pengeluaran']['waktu']; ?><br>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong></strong><br>
                                    <br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title"><?=$data['pengeluaran']['nama']; ?></div>
                        <p class="section-lead"><?=$data['pengeluaran']['deks']; ?></p>
                        <div class="row mt-4">
                            <div class="col-lg-4 text-left">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total Pengeluaran</div>
                                    <div class="invoice-detail-value">Rp. <?=number_format($data['pengeluaran']['total']); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                    <a class="btn btn-primary btn-icon icon-left" href="<?=HOMEBASE; ?>cetak/invoicePengeluaranResto/<?=strtoupper($data['kdTransaksi']); ?>" target="_new">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                    <a class="btn btn-warning btn-icon icon-left" href='#!'>
                        <i class="fas fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= STYLEBASE; ?>/dasbor/detailPengeluaran.js"></script>