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
        }
    }
});

document.getElementById('txtNama').focus();
$('#divGambarContoh').hide();

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