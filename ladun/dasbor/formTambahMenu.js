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
                isiField();
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
        }
    }
});

document.getElementById('txtNama').focus();
$('#divGambarContoh').hide();
var rupiah = document.getElementById('txtHarga');

rupiah.addEventListener('keyup', function(e){
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value);
});

$("#frmUpload").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'http://localhost/Nadha-Resto/menu/prosesTambahMenu',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){

        },
        success: function(data){ 
            sukses();
        }
    });
});

function sembunyikanFotoContoh()
{
    $('#divGambarContoh').hide();
}

function isiField()
{
    Swal.fire({
        'icon' : 'warning',
        'title' : 'Isi field',
        'text' : 'Harap isi semua field'
    });
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