var divMitra = new Vue({
    el : '#divMitra',
    data : {
        nama : '',
        deks : '',
        pemilik : '',
        alamat : '',
        hp : '',
        tipe : 'pemasok'
    },
    methods : {
        tambahMitraAtc : function()
        {
            tambahMitra();
        },
        kembaliAtc : function()
        {
            kembali();
        },
        simpanAtc : function()
        {
            simpan();
        },
        clearAtc : function()
        {

        }
    }
});

//inisialisasi
$('#divTambahMitra').hide();
$('#tblMitra').dataTable();

function simpan() {
    let nama = divMitra.nama;
    let deks = divMitra.deks;
    let pemilik = divMitra.pemilik;
    let alamat = divMitra.alamat;
    let hp = divMitra.hp;
    let tipe = divMitra.tipe;
    if(nama === '' || pemilik === '' || alamat === '' || hp === '' || tipe ===''){
        pesanUmumApp('warning', 'Isi field!!', 'Harap isi field!!');
    }else{

    }
}

function tambahMitra()
{
    divJudul.judulForm = "Tambah Mitra";
    $('#divListMitra').hide();
    $('#divTambahMitra').show();
    document.getElementById('txtNamaMitra').focus();
}

function kembali()
{
    renderMenu(mitra);
    divJudul.judulForm = "Daftar Mitra";
}