//route proses
var routeToTambahUser = server+'manajemenUser/tambahUser';

//main vue objek
var divManajemenUser = new Vue({
    el : '#divManajemenUser',
    data : {
        username : '',
        password : '',
        nama : '',
        tipeUser : ''
    },
    methods : {
        tambahUserAtc : function()
        {
            $('#divDataUser').hide();
            $('#divTambahUser').show();
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
                    let dataSend = {username : this.username, password : this.password, tipeUser : this.tipeUser, nama : this.nama}
                    $.post(routeToTambahUser, dataSend,  function(data){
                        let obj = JSON.parse(data);
                        console.log(obj);
                    });
                }
           }
        }
    }
});

//inisialisasi 
$('#divTambahUser').hide();
$('#tblUser').dataTable();

document.getElementById('btnSimpan').addEventListener("click", function(){
    divManajemenUser.username = document.getElementById('txtUsername').value;
    divManajemenUser.password = document.getElementById('txtPassword').value;
    divManajemenUser.nama = document.getElementById('txtNama').value;
    divManajemenUser.tipeUser = document.getElementById('txtTipeUser').value;
    divManajemenUser.tambahAtc();
});