<section class="section" id='divDetailPembelianBb'>
    <div class="section-body">
        <div class="invoice">
            <div class="invoice-print">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="invoice-title">
                            <h2>Invoice</h2>
                            <div class="invoice-number">Service Id #</div>
                            <span id='txtKodeService' style='display:none;'></span>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <address>
                                    <strong>Pembayaran oleh </strong><br>
                                    Nadha Resto<br>
                                    Jln. Pantai Cermin, No. 12, Perbaungan<br>
                                    <br>
                                </address>
                            </div>
                            <div class="col-md-6 text-md-right">
                                <address>
                                    <strong>Kepada </strong><br>
                                    Toko Delima<br>
                                    <br>
                                    , <br>
                                    , 
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
                        <p class="section-lead">Daftar item produk/service yang dimasukkan</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-md">
                                <tbody>
                                    <tr>
                                        <th data-width="40" style="width: 40px;">#</th>
                                        <th>Produk</th>
                                        <th class="text-center">Harga (@)</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-right">Qt</th>
                                    </tr>
                                    <?php foreach($data['itemPembelian'] as $dp) : ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td class="text-center">Rp. </td>
                                        <td class="text-center"></td>
                                        <td class="text-right">Rp. </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-4 text-left">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total Pembelian</div>
                                    <div class="invoice-detail-value">Rp. <?=number_format($data['pembelian']['total']); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                    <a class="btn btn-primary btn-icon icon-left" href='<?=HOMEBASE; ?>cetak/invoicePembelianBb/<?=$data['pembelian']['kd_pembelian']; ?>' target="new"><i class="fas fa-print"></i>
                        Cetak</a>
                    <button class="btn btn-warning btn-icon icon-left" v-on:click=''><i class="fas fa-reply"></i>
                        Kembali</button>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= STYLEBASE; ?>/dasbor/detailPembelianBahanBaku.js"></script>