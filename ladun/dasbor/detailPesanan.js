//route 
var routeToGetDetailPesanan = server+"pesanan/detailPesananData";

var divDetailPesanan = new Vue({
    el : '#divDetailPesanan',
    data : {
        namaPelanggan : "Memuat  ... ",
        kdInvoice : 'Memuat ... ',
        daftarItems : []
    },
    methods : {
        kembaliAtc : function()
        {

        }
    }
});

var kdPesanan = document.querySelector('#txtKdPesanan').innerHTML;
$.post(routeToGetDetailPesanan, {'kdPesanan':kdPesanan}, function(data){
    let obj = JSON.parse(data);
    divDetailPesanan.namaPelanggan = obj.namaPelanggan;
    divDetailPesanan.kdInvoice = obj.kdInvoice;
    console.log(obj);
});