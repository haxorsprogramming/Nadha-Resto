<div id='divPromo'>
    <div id='divDataPromo'>
        <div style='margin-bottom:15px;'>
            <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' v-on:click='tambahPromoAtc'>
                <i class="fas fa-plus-circle"></i> Tambah Promo
            </a>
        </div>
        <div class="row" id='' style="padding-left:20px;margin-right:10px;">
            <table id='tblPromo' class='table table-hover table-bordered table-stripped'>
                <thead>
                    <tr>
                        <th>Promo</th>
                        <th>Deks</th>
                        <th>Nilai</th>
                        <th>Status / Kuota</th>
                        <th>Expired</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['promo'] as $dp) : 
                        $tipe = $dp['tipe'];
                        $nilai = $dp['value'];
                        $tglExpired = $dp['tanggal_expired'];
                        $tglNow = $this -> tanggal();
                        $cekTanggal = $this -> cekDateCompare($tglExpired, $tglNow);
                        if($cekTanggal === false){
                            $cs = 'Expired';
                        }else{
                            $cs = 'Aktif';
                        }   
                        if($tipe == 'persen'){
                            $capTipe = $nilai."%";
                        }else{
                            $capTipe = "Rp. ".number_format($nilai);
                        }
                    ?>
                    <tr>
                        <td><a href='#!'><strong><?=$dp['nama']; ?></strong></a></td>
                        <td><?=$dp['deks']; ?></td>
                        <td><?=$capTipe; ?></td>
                        <td> <?=$cs; ?> - <?=$dp['kuota']; ?></td>
                        <td><?=$dp['tanggal_expired']; ?></td>
                        <td>
                            <a href='#!' class="btn btn-primary btn-sm btn-icon ico-left" @click='detailAtc("<?=$dp['kd_promo']; ?>")'>
                                <i class='fas fa-info-circle'></i> Detail
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id='divTambahPromo'>
        <div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" v-on:click='kembaliAtc'>
                <i class='fas fa-reply'></i>Kembali
            </a>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                <div class="form-group">
                    <label>Nama Promo</label>
                    <input type="text" class="form-control" id='txtNamaPromo'>
                </div>
                <div class="form-group">
                    <label>Deksripsi Promo</label>
                    <input type="text" class="form-control" id='txtDeks'>
                </div>
                <div class="form-group">
                    <label>Tipe</label>
                    <select class="form-control" id='txtTipe'>
                        <option value="persen">Persen (%)</option>
                        <option value="total_harga">Total harga (Rp.)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nilai</label>
                    <input type="number" class="form-control" id='txtNilai'>
                </div>
                <div class="form-group">
                    <label>Kuota</label>
                    <input type="number" class="form-control" id='txtKuota'>
                </div>
                <div class="form-group">
                    <label>Tanggal Expired</label>
                    <input type="date" class="form-control" id='txtTanggalExpired'>
                </div>
                <div>
                    <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" id='btnSimpan' v-on:click='prosesTambah'>
                        <i class='fas fa-save'></i> Simpan
                    </a>
                    &nbsp;&nbsp;
                    <a href='#!' class="btn btn-lg btn-info btn-icon icon-left" id='btnClearForm'>
                        <i class='fas fa-i-cursor'></i> Clear
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4 class="card-title">Tentang manajemen promo</h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li v-for='mp in manajemenPromo'>{{mp.teks}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/promo.js"></script>