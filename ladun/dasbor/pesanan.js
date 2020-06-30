var divPesananDineIn = new Vue({
    el : '#divPesananDineIn',
    data : {
    }
});

//inisialisasi 
$('#divPesananDineIn').hide();
$(".select2").select2();

document.getElementById('btnDineIn').addEventListener('click', function(){
    $('#divPesananDineIn').show();
    $('#divPilihPesanan').hide();
});