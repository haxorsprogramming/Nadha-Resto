// VUE OBJECT 
var divDetailPesanan = new Vue({
    el : '#divDetailPesanan',
    data : {

    },
    methods : {
        prosesPesanan : function(kdPesanan)
        {
            
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

// FUCTION 
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
           
        }
    });
}