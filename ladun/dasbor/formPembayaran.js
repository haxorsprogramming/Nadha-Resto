var divFormPembayaran = new Vue({
    el : '#divFormPembayaran',
    data : {
        kdPesanan : '',
        kdInvoice : '',
        itemPesanan : [],
        kdPromo : '',
        namaPelanggan : '',
        totalHarga : '',
        tax : '',
        tipePesanan : '',
        jumlahTamu : '',
        noMeja : '',
        waktuMasuk : '',
        hargaAkhir : '',
        tunai : '',
        kembali : '',
        hargaAfterTax : '',
        taxPrice : ''
    },
    methods : {
        cekPromoAtc : function()
        {
            cekPromo();
        }
    }
});

var kdPesananGlobal = document.getElementById('txtKdPesananHidden').value;
divFormPembayaran.kdPesanan = kdPesananGlobal;

//inisialisasi
document.getElementById('txtKodePromo').focus();
$.post('pembayaran/getDataPesanan', {'kdPesanan':kdPesananGlobal} ,function(data){
    let obj = JSON.parse(data);
    // console.log(obj);
    let itemPesanan = obj.tempPesanan;
    divFormPembayaran.kdInvoice = obj.kdInvoice;
    divFormPembayaran.namaPelanggan = obj.namaPelanggan;
    divFormPembayaran.totalHarga = obj.totalHarga;
    divFormPembayaran.hargaAkhir = obj.totalHarga;
    let tipePesanan = obj.tipePesanan;
    let detailPesanan = obj.detailPesanan;
    divFormPembayaran.jumlahTamu = detailPesanan.jumlah_tamu;
    divFormPembayaran.noMeja = obj.namaMeja;
    divFormPembayaran.waktuMasuk = detailPesanan.waktu_masuk;
    let tax = obj.tax;
    divFormPembayaran.tax = tax;
    let taxPrice = parseInt(tax) * parseInt(obj.totalHarga) / 100;
    divFormPembayaran.taxPrice = taxPrice;
    let hargaAfterTax = parseInt(obj.totalHarga) + taxPrice;
    divFormPembayaran.hargaAkhir = hargaAfterTax;
    if(tipePesanan == 'dine_in'){
        divFormPembayaran.tipePesanan = 'Makan di tempat (Dine in)';
    }else{
        divFormPembayaran.tipePesanan = 'Bawa pulang (take away)';
    }
    
    itemPesanan.forEach(renderPesanan);
    
    function renderPesanan(item, index){
        divFormPembayaran.itemPesanan.push({
            namaMenu : itemPesanan[index].namaMenu, 
            hargaAt : itemPesanan[index].hargaAt,
            qt : itemPesanan[index].qt,
            total : itemPesanan[index].total             
        });
    }

});

//cek promo 
function cekPromo()
{
    let kdPromo = divFormPembayaran.kdPromo;
    $.post('pembayaran/cekPromo', {'kdPromo':kdPromo}, function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'error_promo_code'){
            pesanUmumApp('error', 'Error kode promo', 'Kode promo tidak valid/berlaku');
        }else{
            console.log(obj);
        }
    });
}
