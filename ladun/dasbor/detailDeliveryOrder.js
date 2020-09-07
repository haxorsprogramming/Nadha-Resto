// ROUTE 
var routeToBatalkanPesanan = server + 'deliveryOrder/batalkanPesanan';
var routeToProsesPesanan = server + 'deliveryOrder/prosesPesanan';
var routeToKirimPesanan = server + 'deliveryOrder/kirimPesanan';
var routeToSetSelesai = server + 'deliveryOrder/setSelesai';

// VUE OBJECT 
var divDetailPesanan = new Vue({
    el : '#divDetailPesanan',
    data : {
        btnCapKirimPesanan : 'Kirim Pesanan (pilih kurir)',
        statBtnKirim : false
    },
    methods : {
        prosesPesanan : function(kdPesanan)
        {
            prosesPesanan(kdPesanan);
        },
        kirimPesanan : function(kdPesanan)
        {
            if(this.statBtnKirim === false){
                $('#divKurir').show();
                this.btnCapKirimPesanan = 'Kirim pesanan';
                this.statBtnKirim = true;
            }else{
                kirimPesanan(kdPesanan);
            }
        },
        setSelesai : function(kdPesanan)
        {
            setSelesai(kdPesanan);
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

// FUNCTION
function setSelesai(kdPesanan)
{
    Swal.fire({
        title: "Proses?",
        text: "Set status pesanan ke selesai ... ?, pastikan kurir telah menerima pembayaran...",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
    }).then((result) => {
        if (result.value) {
            $('.btn').addClass('disabled');
            progStart();
            $.post(routeToSetSelesai, {'kdPesanan':kdPesanan}, function(data){
                let obj = JSON.parse(data);
                if(obj.status === 'sukses'){
                    progStop();
                    pesanUmumApp('success', 'Sukses', 'Pesanan telah selesai ...');
                    setTimeout(function(){
                        renderMenu('deliveryOrder/detailPesanan/'+kdPesanan);
                        divJudul.judulForm = "Detail Pesanan";
                    }, 1000);
                }
            });
        }
    });
}
function kirimPesanan(kdPesanan)
{
    let kurir = document.querySelector('#txtKurir').value;
    if(kurir === 'none'){
        pesanUmumApp('warning', 'Pilih kurir', 'Pilih kurir pengantar pesanan ...');
    }else{
        Swal.fire({
            title: "Proses?",
            text: "Kirim pesanan ke pelanggan ... ?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.value) {
                $('.btn').addClass('disabled');
                progStart();
                $.post(routeToKirimPesanan, {'kdPesanan':kdPesanan, 'kurir':kurir}, function(data){
                    let obj = JSON.parse(data);
                    if(obj.status === 'sukses'){
                        progStop();
                        pesanUmumApp('success', 'Sukses', 'Berhasil mengubah status pesanan ...');
                        setTimeout(function(){
                            renderMenu('deliveryOrder/detailPesanan/'+kdPesanan);
                            divJudul.judulForm = "Detail Pesanan";
                        }, 1000);
                    }else{

                    }
                });
            }
        });
    }
}

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