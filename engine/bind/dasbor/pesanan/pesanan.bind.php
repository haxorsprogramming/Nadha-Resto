<div id='divPesanan'>
    <div class="row" id='' style="padding-left:20px;margin-right:10px;">
        <table id='tblDaftarPesanan' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th>Kd Pesanan</th>
                    <th>Pelanggan</th>
                    <th>Tipe</th>
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
                    $kdPesananCap = strtoupper(substr($kdPesanan, 0, 3)."-".substr($kdPesanan, 4,3)."-".substr($kdPesanan, 7, 5)); 
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
                        $sbp = 'disabled';
                    }else{
                        $capPembayaran = 'Pending';
                        $colPayment = '#fab1a0';
                        $sbp = '';
                    }
                ?>
                    <tr>
                    <td><a href='#!' style="font-size:18px;"><?=$kdPesananCap; ?></a></td>
                    <td><?=$namaPelanggan; ?></td>
                    <td><?=$capTipe; ?></td>
                    <td><?=$dp['jumlah_tamu']; ?></td>
                    <td>Masuk : <?=$dp['waktu_masuk']; ?><br/>Keluar : </td>
                    <td style="background-color: <?=$colPayment; ?>;"><?=$capPembayaran; ?></td>
                    <td><?=$dp['operator']; ?></td>
                    <td>
                    <a href='#!' class="btn btn-primary btn-icon icon-left <?=$sbp; ?>"  v-on:click='bayarPesanan("<?=$kdPesanan; ?>")'><i class='fas fa-donate'></i> Bayar</a>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table> 
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/daftarPesanan.js"></script> 