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
            {teks : 'Email akan menjadi id pelanggan, maka dari itu tidak boleh ada email yg sama antar pelanggan'},
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
                isiField();
            }else{
                
            }
        }
    }
});

$('#divFormTambahPelanggan').hide();
$('#tblPelanggan').DataTable();

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

function isiField()
{
    Swal.fire({
        icon : 'warning',
        title : 'Isi field!!',
        text : 'Harap isi semua field.'
    });
}