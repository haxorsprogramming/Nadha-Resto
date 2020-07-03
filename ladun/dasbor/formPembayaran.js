var divFormPembayaran = new Vue({
    el : '#divFormPembayaran',
    data : {
        kdPesanan : '',
        itemPesanan : []

    }
});

var kdPesananGlobal = document.getElementById('txtKdPesananHidden').value;
divFormPembayaran.kdPesanan = kdPesananGlobal;

//inisialisasi
$.post('pembayaran/getDataPesanan', {'kdPesanan':kdPesananGlobal} ,function(data){
    let obj = JSON.parse(data);
    console.log(obj);
    let itemPesanan = obj.tempPesanan;
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

