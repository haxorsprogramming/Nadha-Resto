//route
var routeToGetDataArusKas = server+'arusKas/getArusKas';

var divArusKas = new Vue({
    el : '#divArusKas',
    data : {

    }
});

//inisialisasi 
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
    }
});


$('#tblArusKas').on('click', '.btnDetail', function(){
    let kdTransaksi = $(this).data('id');
    renderMenu("arusKas/detailArusKas/"+kdTransaksi);
    divJudul.judulForm = "Detail Arus Kas"; 
});