// ROUTE 
var routeGetMenuTerlaris = server+"dasbor/getMenuTerlaris";
var routeGetTransaksiTerakhir = server+"dasbor/getTransaksiTerakhir";
var routeGetDataBar = server+"dasbor/getDataBar";

// VUE OBJECT 
var divBeranda = new Vue({
    el : '#divBeranda',
    data : {
        menuFavorit : [],
        lastTs : [],
        pengunjung : '...',
        pelanggan : '...',
        profit : '...',
        transaksi : '...'
    },
    methods : {
        menuShowAtc : function()
        {
            renderMenu(menu);
            divJudul.judulForm = "Menu Restoran";
        },
        pesananTerakhirShowAtc : function()
        {
            renderMenu(pesanan);
            divJudul.judulForm = "Daftar Pesanan"; 
        },
        detailPesananAtc : function(kdPesanan)
        {
            window.alert(kdPesanan);
        }
    }
});

//get jumlah pengunjung 
$.post(routeGetDataBar, function(data){
    let obj = JSON.parse(data);
    divBeranda.pengunjung = obj.pengunjung;
    divBeranda.pelanggan = obj.pelanggan;
    divBeranda.profit = obj.rasioProfit;
    divBeranda.transaksi = obj.transaksiHarian;
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
            namaPelanggan : lts[index].namaPelanggan,
            kdPesanan : lts[index].kdPesanan
        });
    }
});