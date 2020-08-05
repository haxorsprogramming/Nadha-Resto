//route proses
var routeToTambahUser = server+'manajemenUser/tambahUser';
var routeToGetDataUser = server+'manajemenUser/getUser';
var routeToUpdateUser = server+'manajemenUser/updateUserProses';
var routeToDeleteUser = server+'manajemenUser/hapusUser';
//main vue objek
var divManajemenUser = new Vue({
    el : '#divManajemenUser',
    data : {
        username : '',
        password : '',
        nama : '',
        tipeUser : '',
        usernameUp : '',
        namaUp : '',
        passwordUp : '',
        tipeUp : '',
        passwordUp : ''
    },
    methods : {
        tambahUserAtc : function()
        {
            $('#divDataUser').hide();
            $('#divTambahUser').show();
            divJudul.judulForm = "Tambah User";
            document.getElementById('txtUsername').focus();
        },
        kembaliAtc : function()
        {
            divMenu.manajemenUserAtc();
        },
        tambahAtc : function()
        {
           if(this.username === '' || this.password === '' || this.nama === '' || this.tipeUser === '' || this.tipeUser === 'none'){
               pesanUmumApp('warning', 'Isi field!!', 'Harap isi field!!!');
           }else{
                if(this.username.length < 4 || this.password.length < 4){
                    pesanUmumApp('warning', 'Isi field!!', 'Minimal username & password 4 karakter!!');
                }else{
                    //go proses brooo
                    let dataSend = {'username':this.username, 'password':this.password, 'tipeUser':this.tipeUser, 'nama':this.nama}
                    $.post(routeToTambahUser, dataSend, function(data){
                        let obj = JSON.parse(data);
                        if(obj.status === 'sukses'){
                            pesanUmumApp('success', 'Sukses', 'Sukses menambahkan user baru');
                            divMenu.manajemenUserAtc();
                        }else{
                            pesanUmumApp('warning', 'Error username', 'Username sudah digunakan!!');
                        }
                    });
                }
           }
        },
        editUserAtc: function(username)
        {
            $('#divTambahUser').hide();
            $('#divDataUser').hide();
            $('#divEditUser').show();
            divJudul.judulForm = "Edit User "+username;
            $.post(routeToGetDataUser, {'username':username}, function(data){
                let obj = JSON.parse(data);
                let userObj = obj.user;
                divManajemenUser.usernameUp = userObj.username;
                divManajemenUser.namaUp = userObj.nama;
                divManajemenUser.tipeUp = userObj.tipe;
            });
            document.getElementById('txtUsernameUp').focus();
        },
        updateUserAtc : function()
        {
            if(this.usernameUp === '' || this.passwordUp === '' || this.tipeUp === 'none' || this.tipeUp === '' || this.namaUp === ''){
                pesanUmumApp('warning', 'Isi field!!', 'Harap isi field!!!');
            }else{
                if(this.usernameUp.length < 4 || this.passwordUp.length < 4){
                    pesanUmumApp('warning', 'Isi field!!', 'Minimal username & password 4 karakter!!');
                }else{
                    //go proses brooo
                    let dataSend = {'username':this.usernameUp, 'password':this.passwordUp, 'tipe':this.tipeUp, 'nama':this.namaUp}
                    $.post(routeToUpdateUser, dataSend, function(data){
                        let obj = JSON.parse(data);
                        pesanUmumApp('success', 'Sukses', 'Sukses mengupdate data user..');
                        divMenu.manajemenUserAtc();
                    });
                }
            }
        },
        hapusUserAtc : function(username)
        {
            Swal.fire({
                title: "Hapus user?",
                text: "Yakin menghapus user "+username+" ... ?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
              }).then((result) => {
                if (result.value) {
                   $.post(routeToDeleteUser, {'username':username}, function(data){
                        let obj = JSON.parse(data);
                        if(obj.status === 'error'){
                            pesanUmumApp('warning', 'Fail action', 'Tidak boleh menghapus akun admin!!');
                        }else{
                            pesanUmumApp('success', 'Sukses', 'Berhasil menghapus user!!');
                            divMenu.manajemenUserAtc();
                        }
                   });
                }
              });
        }
    }
});

//inisialisasi 
$('#divTambahUser').hide();
$('#divEditUser').hide();
$('#tblUser').dataTable();

document.getElementById('btnSimpan').addEventListener("click", function(){
    divManajemenUser.username = document.getElementById('txtUsername').value;
    divManajemenUser.password = document.getElementById('txtPassword').value;
    divManajemenUser.nama = document.getElementById('txtNama').value;
    divManajemenUser.tipeUser = document.getElementById('txtTipeUser').value;
    divManajemenUser.tambahAtc();
});

document.getElementById('btnUpdate').addEventListener("click", function(){
    divManajemenUser.updateUserAtc();
});

document.getElementById('btnClearForm').addEventListener("click", function(){
    document.getElementById('txtUsername').value = '';
    document.getElementById('txtPassword').value = '';
    document.getElementById('txtNama').value = '';
    document.getElementById('txtUsername').focus();
});