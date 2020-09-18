// ROUTE 
var routeToGetDataArusKas = server + 'arusKas/getArusKas';

// VUE OBJECT 
var divArusKas = new Vue({
    el : '#divArusKas',
    data : {

    }
});

// INISIALISASI 
$('#tblArusKas').dataTable({
    "order" : [[1, "desc"]],
    "searching" : false,
    "processing" : true,
    "serverSide": true,
    "ajax":{
        url : routeToGetDataArusKas,
        type: "post",
        error: function(){
            pesanUmumApp('warning', 'Error', 'Error menampilkan data');
        }
    },
    "fnRowCallback": function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
        if (aData[3] == "masuk") {
          $('td', nRow).css('background-color', '#dbffdf');
        }else{
          $('td', nRow).css('background-color', '#ffe8db');
        }
      }
});

$('#tblArusKas').on('click', '.btnDetail', function(){
    let kdTransaksi = $(this).data('id');
    renderMenu("arusKas/detailArusKas/"+kdTransaksi);
    divJudul.judulForm = "Detail Arus Kas"; 
});