//vue object
var divFormTambahMenu = new Vue({
    el : '#divFormTambahMenu',
    data : {

    },
    methods : {
        prosesAtc : function()
        {
            $("#frmUpload").submit();
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
            console.log(data);
        }
    });
});

function sembunyikanFotoContoh()
{
    $('#divGambarContoh').hide();
}