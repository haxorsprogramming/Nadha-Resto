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
                pesanUmum('warning', 'Isi field!!', 'Harap isi semua field!!');
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

        },
        success: function(data){
            switch(data.status){
                case 'error_tipe_file':
                    pesanUmum('error', 'Error tipe file', 'Tipe file yang diperbolehkan JPG, PNG');
                    break;
                case 'error_size_file':
                    pesanUmum('error', 'Error size file', 'Ukuran foto yang diperbolehkan maksimal 2Mb');
                    break;
                case 'nama_menu_exist':
                    pesanUmum('error', 'Error menu name', 'Nama menu sudah digunakan, silahkan ganti');
                    break;
                case 'success':
                    sukses()
                    break;
                default :
            }
        }
    });
});

function pesanUmum(icon, title, text){
    Swal.fire({
        icon : icon,
        title : title,
        text
    });
}

function sembunyikanFotoContoh()
{
    $('#divGambarContoh').hide();
}

function sukses()
{
    Swal.fire({
        'icon' : 'success',
        'title' : 'Sukses',
        'text' : 'Berhasil menambahkan menu baru'
    });
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