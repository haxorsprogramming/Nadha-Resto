<div class="row" id='divSetting'>
    <div class="col-12 col-sm-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4>Pengaturan Umum</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Basic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Akun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Keuangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="other-tab" data-toggle="tab" href="#other" role="tab"
                            aria-controls="other" aria-selected="false">Lainnya</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="form-group">
                            <label>Nama Restoran</label>
                            <input type="text" class="form-control" id='txtNamaResto' disabled>
                        </div>
                        <div class="form-group">
                            <label>Alamat Restoran </label><small> Pisahkan daerah dengan koma (,). Cth Kec. Pariaman, Kab. Pariaman, Sumatera Barat</small>
                            <input type="text" class="form-control" id='txtAlamatResto' disabled>
                        </div>
                        <div class="form-group">
                            <label>Nama Owner</label>
                            <input type="text" class="form-control" id='txtNamaOwnser' disabled>
                        </div>
                        <div class="form-group">
                            <label>Nomor Handphone Restoran</label>
                            <input type="text" class="form-control" id='txtHpRestoran' disabled>
                        </div>
                        <div class="form-group">
                            <label>Email Restoran</label>
                            <input type="text" class="form-control" id='txtEmailRestoran' disabled>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="form-group">
                            <label>Email Host </label><small>(Alamat email untuk pengiriman notifikasi ke
                                pelanggan)</small>
                            <input type="text" class="form-control" id='txtEmailHost' disabled>
                        </div>
                        <div class="form-group">
                            <label>Password Email Host </label><small>(Password akun email untuk pengiriman notifikasi ke
                                pelanggan)</small>
                            <input type="text" class="form-control" id='txtPasswordEmailHost' disabled>
                        </div>
                        <div class="form-group">
                            <label>API Key Waresponder </label><small>(API Key dari wa responder untuk aktifkan notifikasi via whatsapp)</small>
                            <input type="text" class="form-control" id='txtApiKey' disabled>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="form-group">
                            <label>Tahun pembukuan awal</label>
                            <input type="text" class="form-control" id='txtPembukuanAwal' disabled>
                        </div>
                        <div class="form-group">
                            <label>Saldo Awal</label>
                            <input type="text" class="form-control" id='txtSaldoAwal' disabled>
                        </div>
                        <div class="form-group">
                            <label>Pajak (pph & ppn)</label>
                            <input type="text" class="form-control" id='txtPajak' disabled>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">
                    Lainnya
                    </div>
                </div>
                <div>
                    <a href='#!' class="btn btn-lg btn-primary">{{btnCap}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/setting.js"></script>