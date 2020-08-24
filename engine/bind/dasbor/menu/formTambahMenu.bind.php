<div id='divFormTambahMenu'>
    <form enctype="multipart/form-data" id='frmUpload'>
    <div>
        <a href='#!' class="btn btn-primary btn-icon icon-left" id='btnKembali' @click='kembaliAtc'><i class='fas fa-reply'></i> Kembali</a>
    </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Nama Menu</label>
                    <input type="text" class="form-control" id='txtNama' name='txtNama'>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" id='txtKategori' name='txtKategori'>
                       
                        <?php foreach($data['kategori'] as $kategori) : ?>
                        <option value="<?=$kategori['id']; ?>"><?=$kategori['nama']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Deks</label>
                    <textarea class="form-control" placeholder="Deksripsi menu" id='txtDeks' name="txtDeks" style="resize: none;"></textarea>
                </div>
                <div style='font-size:12px;'>
                    <ul>
                        <li><i>Username tidak boleh mengandung spasi</i></li>
                        <li><i>Email &amp; disarankan valid, agar service notifikasi berjalan ke pelanggan</i></li>
                        <li><i>Level user dapat diubah kembali setelah user dibuat</i></li>
                    </ul>
                </div>
                <!-- <label>{{username}}{{namaLengkap}}{{alamat}}{{nomorHandphone}}{{email}}{{levelUser}}</label> -->
                <a href='#!' id='btnSimpan' class="btn btn-lg btn-primary btn-icon icon-left" @click='prosesAtc'>
                    <i class='fas fa-save'></i> Simpan
                </a>
                &nbsp;&nbsp;
                <a href='#!' id='btnClear' class="btn btn-lg btn-info btn-icon icon-left" @click='clearFormAtc'>
                    <i class='fas fa-i-cursor'></i> Clear form
                </a>
                &nbsp;&nbsp;
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Harga</label>
                    <input type="text" class="form-control" name='txtHarga' id='txtHarga'>
                </div>
                <div class="form-group">
                    <label>Satuan</label>
                    <select class="form-control" id='txtSatuan' name='txtSatuan'>
                        <option value='porsi'>porsi</option>
                        <option value='paket'>paket</option>
                        <option value='pcs'>pcs</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" class="form-control" id='txtFoto' name="txtFoto">
                    <small id="passwordHelpBlock" class="form-text text-muted">
                        Tipe file gambar (jpg, png), ukuran maksimal 2 Mb, Dimensi (rasio) gambar yang disarankan
                        berbentuk persegi panjang (1.91 : 1)
                        <a href='#!' v-on:click='lihatContohFotoAtc'>lihat contoh</a>
                    </small>
                    <div id='divGambarContoh' style="padding-top:10px;text-align:center;">
                        <img src='<?=STYLEBASE; ?>/dasbor/img/menu/pic_contoh.jpg' style="width: 200px;border:2px solid #2c3e50;">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
 
        </div>
    </form>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/formTambahMenu.js"></script>