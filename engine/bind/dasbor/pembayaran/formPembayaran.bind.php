<div id='divFormPembayaran'>
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class='card card-primary' style="border-radius:3px; padding:12px;">
        <div class="card-header"><h5>Data Pesanan</h5></div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Kode Pesanan</td><td>: <b><span id=''></span><b/></td>
                </tr>
                <tr>
                    <td>No Invoice</td><td>: <span id=''></span></td>
                </tr>
                <tr>
                    <td>Pelanggan</td><td>:</td>
                </tr>
                <tr>
                    <td>Tipe Pesanan</td><td>: <span id=''></span></td>
                </tr>
                <tr>
                    <td>Jumlah Tamu</td><td>: <span id=''></span> </td>
                </tr>
                <tr>
                    <td>Waktu Masuk</td><td>: <span id=''></span></td>
                </tr>
            </table>
<hr/>
<h6>Item Pesanan</h6>
<table class="table table-bordered table-hover">
<tr>
    <th>Item</th><th>Qt</th><th>Total</th>
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
                    <td>Harga pesanan</td><td>Rp. {{}}</td>
                </tr>
                <tr>
                    <td>Diskon Promo</td><td>Rp. {{}}</td>
                </tr>
                <tr>
                    <td>Kode Promo</td><td>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Kode Promo" id='txtKodePromo'>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button" id='txtGunakan' v-on:click=''>Gunakan</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <tr>
                    <td>Tunai</td><td>
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" placeholder="Tunai" id='txtTunai' v-model='tunai'>
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button" id='txtSetTunai' v-on:click=''>Set</button>
                        </div>
                      </div>
                    </td>
                </tr>
                <tr id='divTblPromo'>
                    <td>
                        Promo 
                    </td>
                    <td><span id='txtNamaPromo'>-</span></td>
                </tr>
                <tr>
                    <td>Harga akhir</td><td>Rp. <span id='txtHargaFinal' style="display: none;"></span><span id='txtHargaFinalCap' style="font-size: 20px;"></span></td>
                </tr> 
                <tr>
                    <td>Tunai</td><td>Rp. </td>
                </tr>
                <tr>
                    <td>Kembali</td><td>Rp. </td>
                </tr>         
            </table>
            <div>
                <a href='#!' class="btn btn-lg btn-primary" v-on:click='' id='btnProsesPembayaran'><i class='fas fa-check-circle'></i> Proses pembayaran</a>&nbsp;&nbsp;
                <a href='#!' class="btn btn-lg btn-warning" id='btnKembali'><i class='fas fa-reply'></i> Kembali</a>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>
<script src="<?= STYLEBASE; ?>/dasbor/formPembayaran.js"></script>