<section class="section" id='divDetailPesanan'>
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>Invoice {{kdInvoice}}</h2>
                            <div class="invoice-number">Service Id # <span id='txtKdPesanan'><?=$data['kdPesanan']; ?></div>
                            <span id='txtKodeService' style='display:none;'></span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Pembayaran oleh </strong><br>
                                    {{namaPelanggan}}<br>
                                    <br>
                                    <br>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Tipe Pesanan </strong><br>
                                    <br>
                                    <br>
                                    <br> 
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Metode pembayaran</strong><br>
                                    Cash<br>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Tanggal Transaksi</strong><br>
                                    <br><br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title">Daftar items</div>
                        <p class="section-lead">Daftar menu yang pesan</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40" style="width: 40px;">#</th>
                                        <th>Menu</th>
                                        <th class="text-center">Harga at</th>
                                        <th class="text-right">Qt</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td ></td>
                                        <td class="text-center"></td>
                                        <td class="text-right"></td>
                                    </tr>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 text-left">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total Pembelian</div>
                                    <div class="invoice-detail-value">Rp.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                    <a class="btn btn-primary btn-icon icon-left" href="<?=HOMEBASE; ?>cetak/invoicePemesanan/<?=strtoupper($data['kdPembelian']); ?>" target="_new">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                    <a class="btn btn-warning btn-icon icon-left" href='#!' @click='kembaliAtc'>
                        <i class="fas fa-reply"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= STYLEBASE; ?>/dasbor/detailPesanan.js"></script>