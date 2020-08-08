<section class="section" id='divDetailPembelianBb'>
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>Invoice</h2>
                            <div class="invoice-number">Service Id # <span id='txtKdPembelian'><?=$data['kdPembelian']; ?></div>
                            <span id='txtKodeService' style='display:none;'></span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Pembayaran oleh </strong><br>
                                    {{namaResto}}<br>
                                    {{alamatResto}}<br>
                                    {{noHpResto}}<br>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Kepada </strong><br>
                                    {{namaMitra}}<br>
                                    {{alamatMitra}}<br>
                                    {{noHpMitra}}<br> 
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
                                    <br>{{waktuPembelian}}<br>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="section-title">Daftar items</div>
                        <p class="section-lead">Daftar item bahan baku yang beli</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40" style="width: 40px;">#</th>
                                        <th>Produk</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-right">Qt</th>
                                    </tr>
                                    <tr v-for='ip in itemPembelian'>
                                        <td></td>
                                        <td >{{ip.nama}}</td>
                                        <td class="text-center">{{ip.satuan}}</td>
                                        <td class="text-right">{{ip.qt}}</td>
                                    </tr>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 text-left">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total Pembelian</div>
                                    <div class="invoice-detail-value">Rp. {{ Number(totalPembelian).toLocaleString() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                    <a class="btn btn-primary btn-icon icon-left" href="<?=HOMEBASE; ?>cetak/invoicePembelianBb/<?=strtoupper($data['kdPembelian']); ?>" target="_new">
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
<script src="<?= STYLEBASE; ?>/dasbor/detailPembelianBahanBaku.js"></script>