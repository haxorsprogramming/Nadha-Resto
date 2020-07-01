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
                    if($tipe === 'dine_in'){
                        $capTipe = 'Makan di tempat';
                    }else{
                        $capTipe = 'Bawa pulang';
                    }
                ?>
                    <tr>
                    <td><a href='#!' style="font-size:18px;" v-on:click='detailPesanan("<?=$kdPesanan; ?>")'><?=$kdPesananCap; ?></a></td>
                    <td><?=$namaPelanggan; ?></td>
                    <td><?=$capTipe; ?></td>
                    <td><?=$dp['jumlah_tamu']; ?></td>
                    <td>Masuk : <?=$dp['waktu_masuk']; ?><br/>Keluar : </td>
                    <td><?=$dp['operator']; ?></td>
                    <td>
                    <div class="dropdown d-inline">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='fas fa-bars'></i> Aksi
                      </button>
                      <div class="dropdown-menu" x-placement="bottom-start" style="border:1px solid grey;position: absolute; transform: translate3d(0px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item has-icon" href="#!" v-on:click=''><i class="fas fa-info-circle"></i> Detail</a>
                      </div>
                    </div>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/daftarPesanan.js"></script> 