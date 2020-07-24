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
            document.getElementById('txtNama').focus();
        },
        kembaliAtc : function()
        {
            renderMenu(pelanggan);
            divJudul.judulForm = "Daftar Pelanggan";
        },
        detailAtc : function(kdPelanggan)
        {
            //event to detail pelanggan
        },
        paginasiAtc : function(page)
        {
            renderMenu('pelanggan/'+page);
            divJudul.judulForm = "Daftar Pelanggan";
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

$('#divFormTambahPelanggan').hide();
// $('#tblPelanggan').DataTable();

document.getElementById('btnKembali').addEventListener("click", function(){
    divPelanggan.kembaliAtc();
});

document.getElementById('btnSimpan').addEventListener("click", function(){
    divFormTambahPelanggan.nama = document.getElementById('txtNama').value;
    divFormTambahPelanggan.alamat = document.getElementById('txtAlamat').value;
    divFormTambahPelanggan.email = document.getElementById('txtEmail').value;
    divFormTambahPelanggan.hp = document.getElementById('txtHp').value;
    divFormTambahPelanggan.prosesTambahPelanggan();
});

document.getElementById('btnClearForm').addEventListener("click", function(){
    clearForm();
});

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
    document.getElementById('txtNama').value = '';
    document.getElementById('txtAlamat').value = '';
    document.getElementById('txtEmail').value = '';
    document.getElementById('txtHp').value = '';
    document.getElementById('txtNama').focus();
}
