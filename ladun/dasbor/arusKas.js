var routeToGetData = server+'arusKas/getArusKas';

var divArusKas = new Vue({
    el : '#divArusKas',
    data : {

    }
});

//inisialisasi 
$('#tblArusKas').dataTable({
    "searching" : false,
    "processing" : true,
    "serverSide": true,
    "ajax":{
        url : routeToGetData,
        type: "post",
        error: function(){
            pesanUmumApp('warning', 'Error', 'Error menampilkan data');
        }
    }
});