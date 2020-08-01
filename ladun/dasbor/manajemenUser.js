//route proses
var routeToTambahUser = server+'manajemenUser/tambahUser';
var routeToGetDataUser = server+'manajemenUser/getUser';

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

document.getElementById('btnClearForm').addEventListener("click", function(){
    document.getElementById('txtUsername').value = '';
    document.getElementById('txtPassword').value = '';
    document.getElementById('txtNama').value = '';
    document.getElementById('txtUsername').focus();
});