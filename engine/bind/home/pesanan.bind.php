<?php 
    $data['namaResto'] = $data['namaResto'];
    $this -> bind('layout/home_header', $data); 
?>

<!-- Content -->
<div id="content">

    <!-- Section -->
    <section class="section bg-light">
        <div class="container" id="divCekPesanan">
            <div class="row row justify-content-center">
                <div class="utility-box" style="width: 500px;">
                    <div class="utility-box-title bg-dark dark">
                        <div class="bg-image"
                            style="background-image: url(&quot;http://assets.suelo.pl/soup/img/photos/modal-review.jpg&quot;);">
                            <img src="http://assets.suelo.pl/soup/img/photos/modal-review.jpg" alt=""
                                style="display: none;"></div>
                        <div>
                            <span class="icon icon-primary"><i class="ti ti-bookmark-alt"></i></span>
                            <h4 class="mb-0">Status pesanan anda</h4>
                            <p class="lead text-muted mb-0">Details about your reservation.</p>
                        </div>
                    </div>
                    <div style="margin-top:20px;margin-left:20px;margin-bottom:20px;">
                        <table class="table">
                            <tr>
                                <td> No Pesanan</td> <td><?=$data['kdPesanan']; ?></td>
                            </tr>
                            <tr>
                                <td>Nama Pelanggan </td><td><?=$data['namaPelanggan']; ?></td>
                            </tr>
                            <tr>
                                <td>Waktu Pesanan </td><td><?=$data['waktuPesanan']; ?></td>
                            </tr>
                            <tr>
                                <td>Status Pesanan </td><td><b><?=$data['statusCap']; ?></b></td>
                            </tr>
                        </table>
                        <hr/>
                        Item Pesanan
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Item</th><th>Harga (@)</th><th>Qt</th><th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['itemPesanan'] as $ip) : ?>
                                <?php 
                                    $menu = $ip['kd_item'];
                                    $detailMenu = $this -> state('deliveryOrderData') -> getDetailMenu($menu);
                                    $namaMenu = $detailMenu['nama'];
                                ?>
                                    <tr>
                                        <td><?=$namaMenu; ?></td>
                                        <td>Rp. <?=number_format($ip['harga_at']); ?></td>
                                        <td><?=$ip['qt']; ?></td>
                                        <td>Rp. <?=number_format($ip['total']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div>
                        <b>Silahkan cek detail pesanan di email anda</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

<?php 
    $data['jsFile'] = 'cekPesanan';
    $this -> bind('layout/home_footer', $data); 
?>