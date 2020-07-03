var divFormPembayaran = new Vue({
    el : '#divFormPembayaran',
    data : {
        kdPesanan : '',

    }
});

var kdPesananGlobal = document.getElementById('txtKdPesananHidden').value;
divFormPembayaran.kdPesanan = kdPesananGlobal;

//inisialisasi
$.post('pembayaran/getDataPesanan', {'kdPesanan':kdPesananGlobal} ,function(data){
    let obj = JSON.parse(data);
    console.log(obj);
});

