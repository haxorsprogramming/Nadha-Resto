var divFormPembayaran = new Vue({
    el : '#divFormPembayaran',
    data : {
        kdPesanan : '',
        kdInvoice : '',
        itemPesanan : [],
        kdPromo : '',
        namaPelanggan : '',
        totalHarga : '',

    }
});

var kdPesananGlobal = document.getElementById('txtKdPesananHidden').value;
divFormPembayaran.kdPesanan = kdPesananGlobal;

//inisialisasi
document.getElementById('txtKodePromo').focus();
$.post('pembayaran/getDataPesanan', {'kdPesanan':kdPesananGlobal} ,function(data){
    let obj = JSON.parse(data);
    console.log(obj);
    let itemPesanan = obj.tempPesanan;
    divFormPembayaran.kdInvoice = obj.kdInvoice;
    divFormPembayaran.namaPelanggan = obj.namaPelanggan;
    divFormPembayaran.totalHarga = obj.totalHarga;
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

