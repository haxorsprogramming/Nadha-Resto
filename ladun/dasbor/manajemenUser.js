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