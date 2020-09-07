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
                            <td>Kd Pesanan</td>
                            <td><?=$data['kdPesanan']; ?></td>
                        </tr>
                        <tr>
                            <td>Pelanggan</td>
                            <td><?=$data['namaPelanggan']; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Pengiriman</td>
                            <td><?=$data['alamatPengiriman']; ?></td>
                        </tr>
                        <tr>
                            <td>Pesanan Masuk</td>
                            <td><?=$data['waktu_order']; ?></td>
                        </tr>
                        <tr>
                            <td>Status Pesanan</td>
                            <td><?=$data['statusCap']; ?></td>
                        </tr>
                        <tr style="display: none;" id='divKurir'>
                            <td>Kurir</td>
                            <td>
                                <select class='form-control select2' style="width: 100%;" id='txtKurir'>
                                    <option value="none">--- Pilih kurir ---</option>
                                    <?php foreach($data['kurir'] as $dk) : ?>
                                        <option value="<?=$dk['username']; ?>"><?=$dk['nama']; ?></option>      
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div style="text-align: center;">
                    <?php if($data['status'] === 'order_masuk') { ?>
                        <a href='#!' class='btn btn-primary btn-lg btn-icon icon-left' @click='prosesPesanan("<?=$data['kdPesanan']; ?>")'>
                            <i class='fas fa-sign-in-alt'></i> Proses Pesanan
                        </a>&nbsp;&nbsp;&nbsp;
                    <?php }elseif($data['status'] === 'diproses') { ?> 
                        <a href='#!' class='btn btn-success btn-lg btn-icon icon-left' @click='kirimPesanan("<?=$data['kdPesanan']; ?>")'>
                            <i class='fas fa-shipping-fast'></i> {{btnCapKirimPesanan}}
                        </a>&nbsp;&nbsp;&nbsp;
                    <?php }elseif($data['status'] === 'dikirim'){ ?> 
                        <a href='#!' class='btn btn-primary btn-lg btn-icon icon-left' @click='setSelesai("<?=$data['kdPesanan']; ?>")'>
                            <i class='fas fa-clipboard-check'></i> Set Pesanan Selesai
                        </a>&nbsp;&nbsp;&nbsp;
                    <?php }elseif($data['status'] === 'sampai'){?>  
                        
                    <?php } ?>
                        
                    <?php if($data['status'] === 'sampai') {?> 
                    
                    <?php }else{ ?> 
                        <a href='#!' class="btn btn-warning btn-lg btn-icon icon-left" @click='batalkanPesananAtc("<?=$data['kdPesanan']; ?>")'>
                            <i class='fas fa-times-circle'></i> Batalkan Pesanan
                        </a>&nbsp;&nbsp;&nbsp;
                    <?php } ?>
                        
                        <a href='#!' class="btn btn-info btn-lg btn-icon icon-left" @click='kembaliAtc'>
                            <i class='fas fa-reply'></i> Kembali
                        </a>
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
                     <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Item</th><th>Harga (@)</th><th>Qt</th><th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data['itemPesanan'] as $ip) : ?>
                            <?php
                                $menu = $ip['kd_item'];
                                //cari nama menu
                                $detailMenu = $this -> state('deliveryOrderData') -> getDetailMenu($menu);
                                $namaMenu = $detailMenu['nama'];
                            ?>
                            <tr>
                                <td style='padding-top:8px;padding-bottom:15px;'>
                                    <img src='<?=STYLEBASE; ?>/dasbor/img/menu/<?=$menu; ?>.jpg' style='width: 120px;border-radius:12px;'><br/>
                                    <b><?=$namaMenu; ?></b>
                                </td>
                                <td>Rp. <?=number_format($detailMenu['harga']); ?></td>
                                <td><?=$ip['qt']; ?></td>
                                <td>Rp. <?=number_format($ip['total']); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                     </table>
                     <div>
                        <address>
                          <strong>Detail Harga</strong><br>
                          Harga Item : Rp. <?=number_format($data['totalHarga']); ?><br>
                          Tax : (<?=$data['tax']; ?> %) Rp. <?=number_format($data['taxPrice']); ?><br>
                          Total Final : <b>Rp. <?=number_format($data['totalFinal']); ?></b>
                        </address>
                     </div>   
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailDeliveryOrder.js"></script>