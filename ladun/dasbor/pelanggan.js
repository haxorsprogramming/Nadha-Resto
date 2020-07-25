var divPelanggan = new Vue({
    el : '#divPelanggan',
    data : {
        dataPelanggan : [],
        pageNow : 1,
        halaman : [
            {no : 1, status : ''},
            {no : 2, status : ''},
            {no : 3, status : ''},
            {no : 4, status : ''},
            {no : 5, status : ''},
        ]
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
            window.alert(kdPelanggan);
        },
        paginasiAtc : function(page)
        {
            this.pageNow = page;
            $('.page-item').removeClass('active');
            $('#pg'+page).addClass('active');
            if(page > 1){
                $('#liPrev').show();
            }else{
                $('#liPrev').hide();
            }
            getPelanggan(page);
        },
        prevAtc : function()
        {
            let pagePrev = this.pageNow - 1;
            $('.page-item').removeClass('active');
            $('#pg'+pagePrev).addClass('active');
            if(pagePrev > 1){
                $('#liPrev').show();
            }else{
                $('#liPrev').hide();
            }
            getPelanggan(pagePrev);
            this.pageNow = pagePrev;
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
//inisialisasi
$('#divFormTambahPelanggan').hide();
$('#liPrev').hide();
$('#pg1').addClass('active');
//table preparation
var pt;
for(pt = 0; pt < 10; pt++){
    divPelanggan.dataPelanggan.push({nama : '', alamat : '', hp : '', lastVisit : '', totalTransaksi : '', idPelanggan : ''});
}
//getPelanggan
var startPage = 1;
setTimeout(function(){getPelanggan(startPage);}, 300);

function getPelanggan(page)
{
    //tampilkan skeleton screen 
    var j;
    for(j = 0; j < parseInt(divPelanggan.dataPelanggan.length); j++){
        divPelanggan.dataPelanggan[j].nama = '';
        divPelanggan.dataPelanggan[j].alamat = '';
        divPelanggan.dataPelanggan[j].hp = '';
        divPelanggan.dataPelanggan[j].lastVisit = '';
        divPelanggan.dataPelanggan[j].totalTransaksi = '';
        divPelanggan.dataPelanggan[j].idPelanggan = '';
    }
    
    setTimeout(function(){
        $.post('pelanggan/getDataPelanggan/'+page, function(data){
            let obj = JSON.parse(data);
            let status = obj.status;

            if(status === 'success'){
                let pelanggan = obj.pelanggan;
                let pjg = pelanggan.length;
                let pjgArr = divPelanggan.dataPelanggan.length;
                //clear tabel sebelumnya 
                var h;
                for(h = 0; h < parseInt(pjgArr); h++){
                    divPelanggan.dataPelanggan.splice(0, 1);
                }
                //push skeleton screen 
                var ut;
                for(ut = 0; ut < parseInt(pjg); ut++){
                    divPelanggan.dataPelanggan.push({nama : '', alamat : '', hp : '', lastVisit : '', totalTransaksi : '', idPelanggan : ''});
                }
                //push data
                var i;
                for(i = 0; i < parseInt(pjg); i++){
                    divPelanggan.dataPelanggan[i].nama = pelanggan[i].nama;
                    divPelanggan.dataPelanggan[i].alamat = pelanggan[i].alamat;
                    divPelanggan.dataPelanggan[i].hp = pelanggan[i].no_hp;
                    divPelanggan.dataPelanggan[i].lastVisit = pelanggan[i].last_visit;
                    divPelanggan.dataPelanggan[i].totalTransaksi = pelanggan[i].total_transaksi;
                    divPelanggan.dataPelanggan[i].idPelanggan = pelanggan[i].id_pelanggan;
                }  
            }else{
                var k;
                for(k = 0; k < 10; k++){
                    divPelanggan.dataPelanggan.splice(0, 1);
                }
            }
        });
    }, 200);
}

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
    document.getElementById('txtNama').value = '';
    document.getElementById('txtAlamat').value = '';
    document.getElementById('txtEmail').value = '';
    document.getElementById('txtHp').value = '';
    document.getElementById('txtNama').focus();
}
