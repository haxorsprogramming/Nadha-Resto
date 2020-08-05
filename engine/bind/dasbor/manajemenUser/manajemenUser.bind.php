<div id='divManajemenUser'>

    <!-- DIV TABEL USER  -->
    <div id='divDataUser'>
        <div style='margin-bottom:15px;'>
            <a href='#!' class='btn btn-lg btn-primary  btn-icon icon-left' @click='tambahUserAtc'>
                <i class="fas fa-plus-circle"></i> Tambah User
            </a>
        </div>
        <div class="row" id='' style="padding-left:20px;margin-right:10px;">
            <table id='tblUser' class='table table-hover table-bordered table-stripped'>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Tipe</th>
                        <th>Last Login</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['user'] as $du) : ?>
                        <tr>
                            <td><a href="#!"><b><?=$du['username']; ?></b></a><br/><?=$du['nama']; ?></td>
                            <td><?=$du['tipe']; ?></td>
                            <td><?=$du['last_login']; ?></td>
                            <td style="text-align: center;">
                                <a href='#!' class="btn btn-sm btn-primary btn-icon icon-left" @click="editUserAtc('<?=$du['username']; ?>')"><i class='far fa-edit'></i> Edit</a>
                                <a href='#!' class="btn btn-sm btn-warning btn-icon icon-left" @click="hapusUserAtc('<?=$du['username']; ?>')"><i class='fas fa-trash-alt'></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- DIV TAMBAH USER  -->
    <div id='divTambahUser'>
        <div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
                <i class='fas fa-reply'></i>Kembali
            </a>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id='txtUsername'>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id='txtPassword'>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id='txtNama'>
                </div>
                <div class="form-group">
                    <label>Tipe User</label>
                    <select class="form-control" id='txtTipeUser'>
                        <option value="none">-- Pilih tipe user ---</option>
                        <option value="admin">Administrator</option>
                        <option value="kasir">Kasir</option>
                        <option value="waiters">Waiters</option>
                        <option value="kurir">Kurir Delivery Order</option>
                        <option value="kitchen">Dapur</option>
                    </select>
                </div>
                <div>
                    <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" id='btnSimpan'><i class='fas fa-save'></i>Simpan</a>
                    &nbsp;&nbsp;
                    <a href='#!' class="btn btn-lg btn-info btn-icon icon-left" id='btnClearForm'><i class='fas fa-i-cursor'></i> Clear</a>
                </div>
            </div>
        </div>
    </div>

    <!-- DIV EDIT USER  -->
    <div id="divEditUser">
        <div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
                <i class='fas fa-reply'></i>Kembali
            </a>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-3">
            <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id='txtUsernameUp' v-model='usernameUp' disabled>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id='txtPasswordUp' v-model='passwordUp'>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" id='txtNamaUp' v-model='namaUp'>
                </div>
                <div class="form-group">
                    <label>Tipe User</label>
                    <select class="form-control" id='txtTipeUserUp' v-model='tipeUp'>
                        <option value="none">-- Pilih tipe user ---</option>
                        <option value="admin">Administrator</option>
                        <option value="kasir">Kasir</option>
                        <option value="waiters">Waiters</option>
                        <option value="kurir">Kurir Delivery Order</option>
                        <option value="kitchen">Dapur</option>
                    </select>
                </div>
                <div>
                    <a href='#!' class="btn btn-lg btn-primary btn-icon icon-left" id='btnUpdate'><i class='fas fa-save'></i>Update</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/manajemenUser.js"></script>