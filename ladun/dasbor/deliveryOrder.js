// ROUTE
var routeToGetDataDeliveryOrder = server + 'deliveryOrder/getDataDeliveryOrder';

// VUE OBJECT 
var divDeliveryOrder = new Vue({
    el : '#divDeliveryOrder',
    data : {

    },
    methods : {
        detailAtc : function(kdPesanan)
        {
            renderMenu('deliveryOrder/detailPesanan/'+kdPesanan);
            divJudul.judulForm = "Detail Pesanan";
        }
    }
});

// INISIALISASI 
$('#tblDeliveryOrder').dataTable({
    "searching" : false,
    "processing" : true,
    "serverSide": true,
    "ajax":{
        url : routeToGetDataDeliveryOrder,
        type: "post",
        error: function(){
            pesanUmumApp('warning', 'Error', 'Error menampilkan data');
        }
    }
});

// FUNCTION 
$('#tblDeliveryOrder').on('click', '.btnDetail', function(){
    let kdPesanan = $(this).data('id');
    divDeliveryOrder.detailAtc(kdPesanan);
});

