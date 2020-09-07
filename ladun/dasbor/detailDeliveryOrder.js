// ROUTE 
var routeToBatalkanPesanan = server + 'deliveryOrder/batalkanPesanan';
var routeToProsesPesanan = server + 'deliveryOrder/prosesPesanan';

// VUE OBJECT 
var divDetailPesanan = new Vue({
    el : '#divDetailPesanan',
    data : {

    },
    methods : {
        prosesPesanan : function(kdPesanan)
        {
            prosesPesanan(kdPesanan);
        },
        kirimPesanan : function()
        {
            $('#divKurir').show();
        },
        batalkanPesananAtc : function(kdPesanan)
        {
            batalkanPesanan(kdPesanan);
        },
        kembaliAtc : function()
        {
            divMenu.deliveryOrderAtc();
        }
    }
});

// INISIALISASI 
$(".select2").select2();

// FUCTION 
function prosesPesanan(kdPesanan)
{
    Swal.fire({
        title: "Proses pesanan?",
        text: "Yakin memproses pesanan ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.value) {
            $.post(routeToProsesPesanan, {'kdPesanan':kdPesanan}, function(data){
                let obj = JSON.parse(data);
                if(obj.status === 'sukses'){
                    pesanUmumApp('success', 'Sukses', 'Berhasil memproses pesanan ...');
                    renderMenu('deliveryOrder/detailPesanan/'+kdPesanan);
                    divJudul.judulForm = "Detail Pesanan";
                }
            });
        }
    });
}

function batalkanPesanan(kdPesanan)
{
    Swal.fire({
        title: "Hapus pesanan?",
        text: "Yakin menghapus pesanan ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.value) {
           $.post(routeToBatalkanPesanan, {'kdPesanan':kdPesanan}, function(data){
                let obj = JSON.parse(data);
                if(obj.status === 'sukses'){
                    pesanUmumApp('success', 'Sukses', 'Berhasil membatalkan pesanan ..');
                    divMenu.deliveryOrderAtc();
                }else{

                }
                
           });
        }
    });
}