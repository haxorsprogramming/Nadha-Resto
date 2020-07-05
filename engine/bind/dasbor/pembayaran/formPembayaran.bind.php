<div id='divFormPembayaran'>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div><input type="hidden" value="<?=$data['kdPesanan']; ?>" id='txtKdPesananHidden'></div>
    <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Data Pesanan</h5></div>
        <div class="card-body">
            <table>
                <tr>
                    <td>No Invoice</td><td>: {{kdInvoice}}</td>
                </tr>
                <tr>
                    <td>Pelanggan</td><td>: {{namaPelanggan}}</td>
                </tr>
                <tr>
                    <td>Tipe Pesanan</td><td>: {{tipePesanan}}</td>
                </tr>
                <tr>
                    <td>Jumlah Tamu</td><td>: {{jumlahTamu}}</td>
                </tr>
                <tr>
                    <td>No Meja</td><td>: {{noMeja}}</td>
                </tr>
                <tr>
                    <td>Waktu Masuk</td><td>: {{waktuMasuk}}</td>
                </tr>
            </table>
<hr/>
<h6>Item Pesanan</h6>
<table class="table table-bordered table-hover">
<tr>
    <th>Item</th><th>Qt</th><th>Total</th>
</tr>
<tr v-for='ip in itemPesanan'>
    <td><b>{{ip.namaMenu}}</b> <br/> Harga (@) Rp. {{ Number(ip.hargaAt).toLocaleString() }}</td>
    <td>{{ip.qt}}</td><td>Rp. {{ Number(ip.total).toLocaleString() }}</td>
</tr>
</table>
        </div>
    </div> 
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Detail Harga</h5></div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <td>Harga pesanan</td><td>Rp. Rp. {{ Number(totalHarga).toLocaleString() }}</td>
                </tr>
                <tr>
                    <td>Kode Promo</td><td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Kode Promo" v-model='kdPromo' id='txtKodePromo'>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button" id='txtGunakan' v-on:click='cekPromoAtc'>Gunakan</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <tr>
                    <td>Tunai</td><td>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Tunai" id='txtTunai' v-model='tunai'>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button" id='txtSetTunai' v-on:click='setFinalHarga'>Set</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <tr id='divTblPromo'>
                    <td>
                        Promo (<b>{{kdPromo}}</b>)
                    </td>
                    <td>Rp. {{ Number(valuePromo).toLocaleString() }}</td>
                </tr>
                <tr>
                    <td>Pajak {{tax}}%</td><td>Rp. {{ Number(taxPrice).toLocaleString() }}</td>
                </tr> 
                <tr>
                    <td>Harga akhir</td><td>Rp. {{ Number(hargaAkhir).toLocaleString() }}</td>
                </tr> 
                <tr>
                    <td>Tunai</td><td>Rp. {{ Number(tunai).toLocaleString() }}</td>
                </tr>
                <tr>
                    <td>Kembali</td><td>Rp. {{ Number(kembali).toLocaleString() }}</td>
                </tr>         
            </table>
            <div>
                <a href='#!' class="btn btn-lg btn-primary" v-on:click='prosesPembayaranAtc' id='btnProsesPembayaran'><i class='fas fa-check-circle'></i> Proses pembayaran</a>&nbsp;&nbsp;
                <a href='#!' class="btn btn-lg btn-warning" id='btnKembali' v-on:click='kembaliAtc'><i class='fas fa-reply'></i> Bayar Nanti & Kembali</a>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/formPembayaran.js"></script>