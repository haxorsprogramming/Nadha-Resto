//main vue objek
var divManajemenUser = new Vue({
    el : '#divManajemenUser',
    data : {

    },
    methods : {
        tambahUserAtc : function()
        {
            $('#divDataUser').hide();
            $('#divTambahUser').show();
        },
        kembaliAtc : function()
        {
            divMenu.manajemenUserAtc();
        }
    }
});

//inisialisasi 
$('#divTambahUser').hide();
$('#tblUser').dataTable();