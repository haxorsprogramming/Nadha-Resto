<div id="divDetailPesanan">

    <div class="row">
        <!-- DETAIL PESANAN  -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Detail Pesanan</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Kd Pesanan</td><td><?=$data['kdPesanan']; ?></td>
                        </tr>
                        <tr>
                            <td>Pelanggan</td><td><?=$data['namaPelanggan']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Pengiriman</td><td><?=$data['alamatPengiriman']; ?></td>
                        </tr>
                        <tr>
                            <td>Pesanan Masuk</td><td><?=$data['waktu_order']; ?></td>
                        </tr>
                        <tr>
                            <td>Status Pesanan</td><td></td>
                        </tr>
                    </table>
                    <div>
                        <a href='#!' class='btn btn-primary btn-icon icon-left'><i class='fas fa-sign-in-alt'></i> Proses Pesanan</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ITEM PESANAN  -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h4>Item Pesanan</h4>
                </div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailDeliveryOrder.js"></script>