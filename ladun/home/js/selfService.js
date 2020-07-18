//vue utama
var divMenu = new Vue({
    el : '#divMenu',
    data : {
        totalHarga : 0
    },
    methods : {

    }
});
var kdMenuDipesan = [];
//vue cart 
var cart = new Vue({
    el : '#divCartFinal',
    data : {
        nama : 'Luar biasa',
        listItem : [],
        totalHarga : 0
    },
    methods : {
        hapusItem : function(kdMenu)
        {
            pesanUmumApp('success', 'success', 'Item menu dihapus dari pesanan ... ');
            let cekPos = kdMenuDipesan.indexOf(kdMenu);
            //cari total harga item yang dipilih
            let tHargaItem = this.listItem[cekPos].harga;
            this.totalHarga = parseInt(this.totalHarga) - parseInt(tHargaItem);
            this.listItem.splice(cekPos, 1);
        }
    }
});
//inisialisasi
function addMenu(kdMenu, nama, harga)
{
    pesanUmumApp('success', 'Item ditambah', 'Berhasil menambahkan menu, silahkah lihat cart pesanan');
    divMenu.totalHarga = parseInt(divMenu.totalHarga) + parseInt(harga);
    let cekArray = kdMenuDipesan.includes(kdMenu);
    if(cekArray === true){
        let cekPos = kdMenuDipesan.indexOf(kdMenu);
        cart.listItem[cekPos].qt = parseInt(cart.listItem[cekPos].qt) + 1;
        cart.listItem[cekPos].harga = parseInt(cart.listItem[cekPos].harga) + parseInt(harga);
        cart.totalHarga = parseInt(cart.totalHarga) + parseInt(harga);
    }else{
        kdMenuDipesan.push(kdMenu);
        cart.listItem.push({nama : nama, harga : harga, qt : 1, hargaAt : harga, kdMenu:kdMenu});
        cart.totalHarga = parseInt(cart.totalHarga) + parseInt(harga);
    }
    console.log(kdMenuDipesan);
    let total = new Intl.NumberFormat().format(divMenu.totalHarga);
    document.getElementById('capJumlah').innerHTML = total;
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}