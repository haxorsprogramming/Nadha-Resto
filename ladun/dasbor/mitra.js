// ROUTE 
var routeToTambahMitra = server + "mitra/tambahMitra";

// VUE OBJECT 
var divMitra = new Vue({
    el : '#divMitra',
    data : {
        nama : '',
        deks : '',
        pemilik : '',
        alamat : '',
        hp : '',
        tipe : ''
    },
    methods : {
        detailAtc: function(kdMitra)
        {
            renderMenu('mitra/detailMitra/' + kdMitra);
            divJudul.judulForm = "Detail Mitra";
        },
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
            clear();
        }
    }
});

// INISIALISASI 
$('#divTambahMitra').hide();
$('#tblMitra').dataTable();

// FUNCTION 
function clear()
{
    divMitra.nama = '';
    divMitra.deks = '';
    divMitra.pemilik = '';
    divMitra.alamat = '';
    divMitra.hp = '';
    divMitra.tipe = '';
    document.querySelector('#txtNamaMitra').focus();
}

function simpan() {
    let nama = divMitra.nama;
    let deks = divMitra.deks;
    let pemilik = divMitra.pemilik;
    let alamat = divMitra.alamat;
    let hp = divMitra.hp;
    let tipe = divMitra.tipe;
    let dataSend = {'nama':nama, 'deks':deks, 'pemilik':pemilik, 'alamat':alamat, 'hp':hp, 'tipe':tipe}
    if(nama === '' || pemilik === '' || alamat === '' || hp === '' || tipe ===''){
        pesanUmumApp('warning', 'Isi field!!', 'Harap isi field!!');
    }else{
        $.post(routeToTambahMitra, dataSend, function(data){
            let obj = JSON.parse(data);
            if(obj.status === 'sukses'){
                pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan mitra baru..');
                renderMenu(mitra);
                divJudul.judulForm = "Daftar Mitra";
            }else{
                pesanUmumApp('error','Error','Nama pemilik & hp sudah terdaftar!!');
            }
        });
    }
}

function tambahMitra()
{
    divJudul.judulForm = "Tambah Mitra";
    $('#divListMitra').hide();
    $('#divTambahMitra').show();
    document.querySelector('#txtNamaMitra').focus();
}

function kembali()
{
    divMenu.mitraAtc();
}