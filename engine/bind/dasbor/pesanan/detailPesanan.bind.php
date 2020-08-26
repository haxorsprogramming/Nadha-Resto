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
                                    {{tipePesanan}}<br>
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
                                    {{waktuPesanan}}<br><br>
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
                                        <th class="text-right">Total</th>
                                    </tr>
                                    <?php foreach($data['pesanan'] as $dp) : 
                                        $namaMenu = $this -> state('utilityData') -> getNamaMenu($dp['kd_menu']);
                                        if($namaMenu === null){
                                            $namaMenu = '<small><i>Menu dihapus </i></small>';
                                        }else{

                                        }
                                    ?>
                                    <tr>
                                        <td></td>
                                        <td><span style='font-size:large;'><?=$namaMenu; ?></span></td>
                                        <td class="text-center">Rp. <?=number_format($dp['harga_at']); ?></td>
                                        <td class="text-right"><?=$dp['qt']; ?></td>
                                        <th class="text-right">Rp. <?=number_format($dp['total']); ?></th>
                                    </tr>
                                    <?php endforeach; ?>
                            </table>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-6 text-left">
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total Harga Pesanan</div>
                                    <div class="invoice-detail-value"><small>Rp. {{ Number(totalPembelian).toLocaleString() }}</small></div>
                                </div>
                                
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Total Final</div>
                                    <div class="invoice-detail-value">Rp. {{ Number(totalFinal).toLocaleString() }}</div>
                                </div>
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Tunai</div>
                                    <div class="invoice-detail-value"><small>Rp. {{ Number(tunai).toLocaleString() }}</small></div>
                                </div>
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Kembali</div>
                                    <div class="invoice-detail-value"><small>Rp. {{ Number(kembali).toLocaleString() }}</small></div>
                                </div>
                            </div>
                            <div class="col-lg-6 text-right">
                            <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Tax (Pajak)</div>
                                    <div class="invoice-detail-value"><small>+ Rp. {{ Number(tax).toLocaleString() }}</small></div>
                                </div>
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Promo</div>
                                    <div class="invoice-detail-value"><small>- Rp. {{ Number(diskon).toLocaleString() }}</small></div>
                                </div>
                                <div class="invoice-detail-item">
                                    <div class="invoice-detail-name">Operator</div>
                                    <div class="invoice-detail-value"><small>{{operator}}</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-md-right">
                <div class="float-lg-left mb-lg-0 mb-3">
                    <a class="btn btn-primary btn-icon icon-left" href="<?=HOMEBASE; ?>cetak/invoicePemesanan/<?=strtoupper($data['kdPesanan']); ?>" target="_new">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= STYLEBASE; ?>/dasbor/detailPesanan.js"></script>