<div id='divManajemenUser'>
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
                            <td><b><?=$du['username']; ?></b><br/><?=$du['nama']; ?></td>
                            <td><?=$du['tipe']; ?></td>
                            <td><?=$du['last_login']; ?></td>
                            <td><a href='#!' class="btn btn-sm btn-primary btn-icon icon-left">Edit</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id='divTambahUser'>
        <div>
            <a href='#!' class="btn btn-primary btn-icon icon-left" @click='kembaliAtc'>
                <i class='fas fa-reply'></i>Kembali
            </a>
        </div>
        <div class="row">
            
        </div>
    </div>
</div>
<script src="<?=STYLEBASE; ?>/dasbor/manajemenUser.js"></script>