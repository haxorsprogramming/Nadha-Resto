<!-- Div pengeluaran -->
<div id='divPengeluaran'>
    <!-- Div history pembelian -->
    <div id='divHistoryPengeluaran'>
        <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahPengeluaranAtc'>
            <i class="fas fa-plus-circle"></i> Tambah Pengeluaran
        </a>
        <div style="margin-top: 20px;">
            <table id='tblHistoryPengeluaran' class='table table-hover table-bordered table-stripped'>
                <thead>
                    <tr>
                        <th>Pengeluaran</th>
                        <th>Deks</th>
                        <th>Kategori</th>
                        <th>Total</th>
                        <th>Operator</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
 <!-- Div form tambah pengeluaran -->
    <div id='divTambahPengeluaran'>
        <a href='#!' class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
            <i class='fas fa-reply'></i>Kembali
        </a>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                <div class="card card-primary">
                    <div class="card-header"><h4>Form tambah pengeluaran</h4></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Pengeluaran</label>
                            <input type="text" class="form-control" id="txtNamaPengeluaran">
                        </div>
                        <div class="form-group">
                            <label>Deksripsi</label>
                            <textarea class="form-control" id='txtDeksripsi' style="resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <select class="form-control" id='txtKategori'>
                                <option>Listrik</option>
                                <option>Operasional</option>
                                <option>Gaji Pegawai</option>
                                <option>Lain lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <a href='#!' class="btn btn-primary btn-icon icon-left"><i class='fas fa-check-circle'></i> Simpan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End div pengeluaran  -->
</div>
<script src="<?=STYLEBASE; ?>/dasbor/pengeluaran.js"></script>