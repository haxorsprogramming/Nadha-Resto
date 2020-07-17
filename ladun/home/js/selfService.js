//vue utama
var divMenu = new Vue({
    el : '#divMenu',
    data : {
        totalHarga : 0
    },
    methods : {

    }
});

//vue cart 
var cart = new Vue({
    el : '#divCartFinal',
    data : {
        nama : 'Luar biasa',
        listItem : []
    }
});
//inisialisasi
function addMenu(kdMenu, nama, harga)
{
    pesanUmumApp('success', 'Item ditambah', 'Berhasil menambahkan menu, silahkah lihat cart pesanan');
    divMenu.totalHarga = parseInt(divMenu.totalHarga) + parseInt(harga);
    cart.listItem.push({
        nama : nama, harga : harga
    });
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