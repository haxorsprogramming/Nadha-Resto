// ROUTE 
var routeToGetDataPelanggan = server + "pelanggan/getDataPelanggan";
var routeToDeletePelanggan = server + "pelanggan/hapusPelanggan";
var routeToDetailPelanggan = server + "pelanggan/detailPelanggan/";

// VUE OBJECT 
var divPelanggan = new Vue({
    el : '#divPelanggan',
    data : {

    },
    methods : {
        tambahPelangganAtc : function()
        {
            $('#divFormTambahPelanggan').show();
            $('#divPelanggan').hide();
            divJudul.judulForm = "Tambah Pelanggan";
            document.querySelector('#txtNama').focus();
        },
        kembaliAtc : function()
        {
            renderMenu(pelanggan);
            divJudul.judulForm = "Daftar Pelanggan";
        },
        detailAtc : function(kdPelanggan)
        {
            divJudul.judulForm = "Detail Pelanggan";
            renderMenu('pelanggan/detailPelanggan/'+kdPelanggan);
        },
        hapusAtc : function(kdPelanggan)
        {
            let pchPel = kdPelanggan.split('|');
            let kdPel = pchPel[0];
            let namaPel = pchPel[1];

            Swal.fire({
                title: "Hapus pelanggan?",
                text: "Yakin menghapus "+namaPel+" dari list pelanggan ... ?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.value) {
                   $.post(routeToDeletePelanggan, {'kdPelanggan':kdPel}, function(data){
                       let obj = JSON.parse(data);
                       if(obj.status === 'sukses'){
                           pesanUmumApp('success', 'Sukses', 'Berhasil menghapus pelanggan!!');
                           divMenu.pelangganAtc();
                       }
                   });
                }
            });
            
        }
    }
});
 
var divFormTambahPelanggan = new Vue({
    el : '#divFormTambahPelanggan',
    data : {
        bantuan : [
            {teks : 'Data pelanggan yang lengkap akan meningkatkan akurasi statistik data restoran'},
            {teks : 'Nomor hp pelanggan disarankan juga nomor whatsapp yang bersangkutan'},
            {teks : 'Nomor hp, email disarankan valid agar dapat digunakan untuk mengirimkan promosi, pengumuman, dll'},
            {teks : 'Nama & nomor hp akan menjadi id pelanggan, maka dari itu tidak boleh ada nama & nomor handphone yg sama antar pelanggan'},
        ],
        nama : '',
        alamat : '',
        hp : '',
        email : ''
    },
    methods : {
        prosesTambahPelanggan : function() 
        {
            if(this.nama === '' || this.alamat === '' || this.hp === '' || this.email === ''){
                pesanUmumApp('warning', 'Isi field!!', 'Harap isi semua field!!');
            }else{
                prosesTambahPelanggan();
            }
        }
    }
});

// INISIALISASI 
$('#divFormTambahPelanggan').hide();

$('#tblPelanggan').dataTable({
    "searching" : false,
    "processing" : true,
    "serverSide": true,
    "ajax":{
        url : routeToGetDataPelanggan,
        type: "post",
        error: function(){
            pesanUmumApp('warning', 'Error', 'Error menampilkan data');
        }
    }
});

document.getElementById('btnKembali').addEventListener("click", function(){
    divPelanggan.kembaliAtc();
});

document.getElementById('btnSimpan').addEventListener("click", function(){
    divFormTambahPelanggan.nama = document.querySelector('#txtNama').value;
    divFormTambahPelanggan.alamat = document.querySelector('#txtAlamat').value;
    divFormTambahPelanggan.email = document.querySelector('#txtEmail').value;
    divFormTambahPelanggan.hp = document.querySelector('#txtHp').value;
    divFormTambahPelanggan.prosesTambahPelanggan();
});

document.getElementById('btnClearForm').addEventListener("click", function(){
    clearForm();
});

// FUNCTION 
function prosesTambahPelanggan()
{
    const nama = divFormTambahPelanggan.nama;
    const alamat = divFormTambahPelanggan.alamat;
    const email = divFormTambahPelanggan.email;
    const hp = divFormTambahPelanggan.hp;
    $('#btnSimpan').addClass('disabled');
    $.post('pelanggan/prosesTambahPelanggan', {'nama': nama, 'alamat':alamat, 'email':email, 'hp':hp}, function(data){
       let obj = JSON.parse(data);
       if(obj.status === 'sukses'){
        messageSukses();
        $('#btnSimpan').removeClass('disabled');
       }else{
        pesanUmumApp('error', 'Gagal', 'Gagal menambahkan pelanggan baru, periksa apakah pelanggan sudah terdaftar!!');
        $('#btnSimpan').removeClass('disabled');  
       }
    });
}

function messageSukses()
{
    pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan pelanggan baru');  
    renderMenu(pelanggan);
    divJudul.judulForm = "Daftar Pelanggan";
}

function clearForm()
{
    document.querySelector('#txtNama').value = '';
    document.querySelector('#txtAlamat').value = '';
    document.querySelector('#txtEmail').value = '';
    document.querySelector('#txtHp').value = '';
    document.querySelector('#txtNama').focus();
}

$('#tblPelanggan').on('click', '.btnDetail', function(){
    let kdPelanggan = $(this).data('id');
    divPelanggan.detailAtc(kdPelanggan);
});

$('#tblPelanggan').on('click', '.btnHapus', function(){
    let kdPelanggan = $(this).data('id');
    divPelanggan.hapusAtc(kdPelanggan);
});