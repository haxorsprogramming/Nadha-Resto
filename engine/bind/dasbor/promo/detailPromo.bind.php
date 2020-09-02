<div class="row" id="divDetailPromo">
    <!-- DETAIL PROMO  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header">Detail Promo</div>
            <div class="card-body">
                <table class="table" style="width: 100%;">
                    <tr>
                        <th>Nama Promo</th>
                        <th><input type='text' id='txtNamaPromo' value="<?=$data['promo']['nama']; ?>" class="form-control" disabled></th>
                        <input type="hidden" id="txtKdPromo" value="<?=$data['kdPromo']; ?>">
                    </tr>
                    <tr>
                        <th>Deks</th>
                        <th><textarea class='form-control' id='txtDeks' style="resize: none;" disabled><?=$data['promo']['deks']; ?></textarea></th>
                    </tr>
                    <tr>
                        <th>Tipe</th>
                        <th>
                            <select class='form-control' disabled id='txtTipe'>
                                <?php foreach($data['tipe'] as $tipe) : ?>
                                    <?php if($data['promo']['tipe'] === $tipe) { ?> 
                                        <option selected value="<?=$tipe; ?>"><?=$tipe; ?></option>
                                    <?php } else { ?> 
                                        <option value="<?=$tipe; ?>"><?=$tipe; ?></option>
                                    <?php } ?>
                                    
                                <?php endforeach; ?>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <th>Nilai</th>
                        <th><input type="text" class="form-control" id="txtNilai" disabled value="<?=$data['promo']['value']; ?>"></th>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>
                            <?php 
                                $tanggalExpired = $data['promo']['tanggal_expired'];
                                $tanggalNow = $this -> tanggal();
                                $cekTanggal = $this -> cekDateCompare($tanggalExpired, $tanggalNow);
                                if($cekTanggal === false) {
                                    echo "Expired";
                                }else{
                                    echo "Aktif";
                                }
                            ?>
                        </th>
                    </tr>
                    <tr>
                        <th>Kuota</th>
                        <th><input type="text" id='txtKuota' class="form-control" value="<?=$data['promo']['kuota']; ?>" disabled></th>
                    </tr>
                    <tr>
                        <th>Tanggal Expired</th>
                        <th><input type="date" class="form-control" id='txtTanggalExpired' value="<?=$data['promo']['tanggal_expired']; ?>" disabled></th>
                    </tr>
                </table>
                <div style="text-align: center;margin-bottom:12px;">
                    <a href='#!' class="btn btn-primary btn-lg btn-icon icon-left" @click='editAtc'>
                        <i :class='btnClass'></i> {{btnCap}}
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href='#!' class="btn btn-warning btn-lg btn-icon icon-left" @click='hapusPromoAtc("<?=$data['kdPromo']; ?>")'>
                        <i class='fas fa-trash-alt'></i> Hapus Promo
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href='#!' class="btn btn-info btn-lg btn-icon icon-left" @click='kembaliAtc'>
                        <i class='fas fa-reply'></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- STATISTIK PROMO  -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-primary">
            <div class="card-header">Histori Transaksi</div>
            no data
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/detailPromo.js"></script>