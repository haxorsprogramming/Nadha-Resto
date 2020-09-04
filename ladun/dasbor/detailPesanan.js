// ROUTE 
var routeToGetDetailPesanan = server+"pesanan/detailPesananData";

// VUE OBJECT 
var divDetailPesanan = new Vue({
    el : '#divDetailPesanan',
    data : {
        namaPelanggan : ' ... ',
        kdInvoice : ' ... ',
        tipePesanan : ' ...',
        waktuPesanan : ' ... ',
        totalPembelian : 0,
        kdPromo : ' ... ',
        diskon : 0,
        tax : 0,
        totalFinal :  0,
        tunai : 0,
        kembali : 0,
        operator : ' ... ',
        daftarItems : []
    },
    methods : {
        kembaliAtc : function()
        {

        }
    }
});

// INISIALISASI 
var kdPesanan = document.querySelector('#txtKdPesanan').innerHTML;

$.post(routeToGetDetailPesanan, {'kdPesanan':kdPesanan}, function(data){
    let obj = JSON.parse(data);
    divDetailPesanan.namaPelanggan = obj.namaPelanggan;
    divDetailPesanan.kdInvoice = obj.kdInvoice;
    divDetailPesanan.waktuPesanan = obj.waktuPembayaran;
    if(obj.tipePesanan === 'dine_in'){
        divDetailPesanan.tipePesanan = "Makan di tempat (Dine in)";
    }else{
        divDetailPesanan.tipePesanan = "Bawa pulang (Take away)";
    }
    divDetailPesanan.totalPembelian = obj.totalPembelian;
    divDetailPesanan.kdPromo = obj.kdPromo;
    divDetailPesanan.diskon = obj.diskon;
    divDetailPesanan.tax = obj.tax;
    divDetailPesanan.totalFinal = obj.totalFinal;
    divDetailPesanan.tunai = obj.tunai;
    divDetailPesanan.kembali = obj.kembali;
    divDetailPesanan.operator = obj.operator;
});