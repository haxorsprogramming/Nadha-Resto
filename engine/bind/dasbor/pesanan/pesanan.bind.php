<div id='divPesanan'>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
        <table id='tblDaftarPesanan' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Pesanan</th>
                    <th>Tipe</th>
                    <th>Meja</th>
                    <th>Tamu</th>
                    <th>Waktu</th>
                    <th>Status Pembayaran</th>
                    <th>Operator</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['daftarPesanan'] as $dp) :
                    $kdPesanan = $dp['kd_pesanan'];
                    $kdPelanggan = $dp['pelanggan'];
                    $namaPelanggan = $this -> state('utilityData') -> getNamaPelanggan($kdPelanggan);
                    $kdPesananCap = strtoupper(substr($kdPesanan, 0, 4))."..."; 
                    $tipe = $dp['tipe'];
                    $sp = $dp['status'];

                    if($tipe === 'dine_in'){
                        $capTipe = 'Makan di tempat';
                    }else{
                        $capTipe = 'Bawa pulang';
                    }
                    if($sp === 'done'){
                        $capPembayaran = 'Selesai';
                        $colPayment = '#55efc4';
                    }else{
                        $capPembayaran = 'Pending';
                        $colPayment = '#fab1a0';
                    }
                ?>
                    <tr>
                    <td><a href='#!' style="font-size:14px;"><?=$kdPesananCap; ?></a><br/>
                    <?=$namaPelanggan; ?>
                    </td>
                    <td><?=$capTipe; ?></td>
                    <td></td>
                    <td><?=$dp['jumlah_tamu']; ?></td>
                    <td>Masuk : <?=$dp['waktu_masuk']; ?><br/>Selesai : <?=$dp['waktu_selesai']; ?></td>
                    <td style="background-color: <?=$colPayment; ?>;"><?=$capPembayaran; ?></td>
                    <td><?=$dp['operator']; ?></td>
                    <td>
                    <?php if($sp === 'done'){ ?> 
                        <a href='#!' class="btn btn-info btn-icon icon-left" v-on:click='detailPesanan("<?=$kdPesanan; ?>")'><i class='fas fa-info-circle'></i>Detail</a>
                    <?php }else{ ?>
                        <div class="dropdown d-inline mr-2">
                      <button class="btn btn-primary dropdown-toggle btn-icon icon-left" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fa-sliders-h'></i> Aksi
                      </button>
                      <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="#!" v-on:click='updatePesanan("<?=$kdPesanan; ?>")'>Update Pesanan</a>
                        <a class="dropdown-item" href="#!" v-on:click='bayarPesanan("<?=$kdPesanan; ?>")'>Bayar</a>
                        <a class="dropdown-item" href="#!">Batalkan Pesanan</a>
                      </div>
                    </div>
                        
                    <?php }?>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/daftarPesanan.js"></script> 