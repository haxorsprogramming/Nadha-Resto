<div id='divFormTambahMenu'>
  <div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" id='txtUsername'>
    </div>
    <div class="form-group">
          <label>Nama Lengkap</label> 
          <input type="text" class="form-control">
    </div>
    <div class="form-group">
          <label>Alamat</label>
          <input type="text" class="form-control">
    </div>
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6 col-12">
    <div class="form-group">
          <label>Nomor Handphone</label>
          <input type="text" class="form-control" id='txtNomorHandphone'>
    </div>
    <div class="form-group">
          <label>Email</label>
          <input type="text" class="form-control" id='txtEmail'>
    </div>
    <div class="form-group">
          <label>Level User</label>
          <select class="form-control" name="">
            <option>Basic</option>
            <option>Gold</option>
            <option>Platinum</option>
          </select>
    </div>

  </div>
</div>
<div class="form-group">
  <div style='font-size:12px;'>
    <ul>
      <li><i>Username tidak boleh mengandung spasi</i></li>
      <li><i>Email &amp; disarankan valid, agar service notifikasi berjalan ke pelanggan</i></li>
      <li><i>Level user dapat diubah kembali setelah user dibuat</i></li>
    </ul>
  </div>
  <!-- <label>{{username}}{{namaLengkap}}{{alamat}}{{nomorHandphone}}{{email}}{{levelUser}}</label> -->
    <a href='#!' id='btnSimpan' class="btn btn-lg btn-primary btn-icon icon-left" v-on:click='simpan'><i class='fas fa-save'></i> Simpan</a>
    &nbsp;&nbsp;
    <a href='#!' id='btnClear' class="btn btn-lg btn-warning btn-icon icon-left" v-on:click='clearForm'><i class='fas fa-clipboard-check'></i> Clear form</a>
&nbsp;&nbsp;
    <a href='#!' id='btnKembali' class="btn btn-lg btn-success btn-icon icon-left" v-on:click='kembali'><i class='fas fa-reply'></i> Kembali</a>
</div>
</div>

<script src="<?=STYLEBASE; ?>/dasbor/formTambahMenu.js"></script>