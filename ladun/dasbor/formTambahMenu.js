//route 

//vue object
var divFormTambahMenu = new Vue({
    el : '#divFormTambahMenu',
    data : {

    },
    methods : {
        prosesAtc : function()
        {
            let foto = document.getElementById('txtFoto').value;
            let nama = document.getElementById('txtNama').value;
            let kategori = document.getElementById('txtKategori').value;
            let deks = document.getElementById('txtDeks').value;
            let harga = document.getElementById('txtHarga').value;
            let satuan = document.getElementById('txtSatuan').value;

            if(foto === '' || nama === '' || kategori === '' || deks === '' || harga === '' || satuan === ''){
                pesanUmumApp('warning', 'Isi field!!', 'Harap isi semua field!!');
            }else{
                $("#frmUpload").submit();
            }
        },
        lihatContohFotoAtc : function()
        {
            $('#divGambarContoh').show();
            setTimeout(sembunyikanFotoContoh, 3500);
        },
        kembaliAtc : function()
        {
            renderMenu(menu);
            divJudul.judulForm = "Menu Restoran";
        },
        clearFormAtc : function()
        {
            clearForm();
        }
    }
});
//inisialisasi
document.getElementById('txtNama').focus();
$('#divGambarContoh').hide();
var rupiah = document.getElementById('txtHarga');

rupiah.addEventListener('keyup', function(e){
    rupiah.value = formatRupiah(this.value);
});

$("#frmUpload").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'menu/prosesTambahMenu',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            blurButton();
        },
        success: function(data){
            switch(data.status){
                case 'error_tipe_file':
                    pesanUmumApp('error', 'Error tipe file', 'Tipe file yang diperbolehkan JPG, PNG');
                    activeButton();
                    break;
                case 'error_size_file':
                    pesanUmumApp('error', 'Error size file', 'Ukuran foto yang diperbolehkan maksimal 2Mb');
                    activeButton();
                    break;
                case 'nama_menu_exist':
                    pesanUmumApp('error', 'Error menu name', 'Nama menu sudah digunakan, silahkan ganti');
                    activeButton();
                    break;
                case 'success':
                    sukses()
                    break;
                default :
            }
        }
    });
});

function blurButton()
{
    $('#btnSimpan').addClass('disabled');
    $('#btnClear').addClass('disabled');
    $('#btnKembali').addClass('disabled');
}

function activeButton()
{
    $('#btnSimpan').removeClass('disabled');
    $('#btnClear').removeClass('disabled');
    $('#btnKembali').removeClass('disabled');
}

function sembunyikanFotoContoh()
{
    $('#divGambarContoh').hide();
}

function sukses()
{
    pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan menu baru');
    renderMenu(menu);
    divJudul.judulForm = "Menu Restoran";
}

function clearForm()
{
    document.getElementById("txtFoto").value = '';
    document.getElementById("txtNama").value = '';
    document.getElementById("txtDeks").value = '';
    document.getElementById("txtHarga").value = '';
    document.getElementById('txtNama').focus();
}

function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}