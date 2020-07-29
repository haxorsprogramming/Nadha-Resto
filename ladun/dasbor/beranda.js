//inisialisasi route
var routeGetMenuTerlaris = server+"dasbor/getMenuTerlaris";
var routeGetTransaksiTerakhir = server+"dasbor/getTransaksiTerakhir";
var routeGetJlhPengunjung = server+"dasbor/getJlhPengunjung";

var divBeranda = new Vue({
    el : '#divBeranda',
    data : {
        menuFavorit : [],
        lastTs : [],
        pengunjung : '...',
        pelanggan : '...',
        profit : '...',
        transaksi : '...'
    }
});

//get jumlah pengunjung 
$.post(routeGetJlhPengunjung, function(data){
    let obj = JSON.parse(data);
    divBeranda.pengunjung = obj.pengunjung;
});

//get menu terlaris
$.post(routeGetMenuTerlaris, function(data){
    let obj = JSON.parse(data);
    let dt = obj.menuTerlaris;
    dt.forEach(renderMenu);
    function renderMenu(item, index){
        divBeranda.menuFavorit.push({
            judul : dt[index].nama,
            pic : dt[index].pic,
            deks : dt[index].deks,
            total_dipesan : dt[index].total_dipesan
        });
    }
});

//get transaksi terakhir
$.post(routeGetTransaksiTerakhir, function(data){
    let obj = JSON.parse(data);
    let lts = obj.lt;
    lts.forEach(renderLs);
    function renderLs(item, index){
        divBeranda.lastTs.push({
            total : lts[index].total,
            waktu : lts[index].waktu,
            namaPelanggan : lts[index].namaPelanggan
        });
    }
});