<!-- LIST PELANGGAN  -->
<div id='divPelanggan'>
    <div style='margin-bottom:15px;'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahPelangganAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Pelanggan
        </a>
    </div>

    <div class="row" style="padding-left:20px;margin-right:10px;">

        <table id='tblPelanggan' class='table table-hover table-bordered table-stripped'>
            <thead>
                <tr>
                    <th style="text-align: center;">Pelanggan</th>
                    <th>Alamat</th>
                    <th>Hp</th>
                    <th>Terakhir Kunjungan</th>
                    <th>Total Transaksi</th>
                    <th></th>
                </tr>
            </thead>
        </table>
        
    </div>
</div>
<!-- FORM TAMBAH PELANGGAN  -->
<div id='divFormTambahPelanggan'>
    <div>
        <a href='#!' class="btn btn-primary btn-icon icon-left" id='btnKembali'><i class='fas fa-reply'></i> Kembali</a>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text" class="form-control" id='txtNama'>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" id='txtAlamat'>
            </div>
            <div class="form-group">
                <label>Hp</label>
                <input type="text" class="form-control" id='txtHp'>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id='txtEmail'>
            </div>
            <div>
                <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" id='btnSimpan'>
                    <i class='fas fa-save'></i>Simpan
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
                    <h4 class="card-title">Tentang manajemen pelanggan</h4>
                </div>
                <div class="card-body">
                    <ul>
                        <li v-for='bt in bantuan'>{{bt.teks}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/pelanggan.js"></script>