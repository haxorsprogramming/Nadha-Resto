// ROUTE
var routeToGetDataKategori = server + 'utility/getDataKategori';
var routeToUpdateTemp = server + 'pesanan/updateTempPesanan';
var routeToGetDataMenuKategori = server + 'utility/getDataMenuKategori';
var routeToGetTempFirst = server + 'pesanan/getTempFirst';
var routeToGetDetailPesanan = server + 'pesanan/getDetailPesanan';

// VUE OBJECT 
var divUpdatePesanan = new Vue({
    el : '#divUpdatePesanan',
    data : {
        kdPesanan : '',
        dataMenu : [],
        dataKategori : [],
        menuFresh : [],
        kategoriDipilih : '',
        namaPelanggan : 'memuat...',
        meja : 'memuat...',
        jlhTamu : 'memuat...',
        totalHarga : ''
    },
    methods : {
        updateMenu : function()
        {
            updateMenu();
        },
        updateAtc : function()
        {
            updateProses();
        },
        hapusItem : function(kdMenu)
        {
            hapusItem(kdMenu);
        },
        tambahItem(kdMenu, nama, harga)
        {
            tambahItem(kdMenu, nama, harga);
        },
        kembaliAtc : function()
        {
            kembaliAtc();
        }
    }
});

// INISIALISASI
var dataMenuUpdate = []; 
divUpdatePesanan.kdPesanan = document.getElementById('txtKdPesanan').innerHTML;
setTimeout(getDataPesanan, 200);
setTimeout(getTempMenuFirst, 200);

$.post(routeToGetDataKategori, function(data){
    let obj = JSON.parse(data);
    let listKategori = obj.kategori;
    listKategori.forEach(renderKategori);
    function renderKategori(item, index){
        divUpdatePesanan.dataKategori.push({
            kd : listKategori[index].id,
            nama : listKategori[index].nama
        });
    }
});

// FUNCTION 
function updateProses()
{
    let totalHarga = divUpdatePesanan.totalHarga;
    let listPesanan = divUpdatePesanan.menuFresh;
    let kdPesanan = divUpdatePesanan.kdPesanan;
    // HAPUS TEMP PESANAN LAMA
    hapusTempLama(kdPesanan);
    // UPDATE TEMP PESANAN
    if(totalHarga > 0){
        listPesanan.forEach(renderUpdate);
        function renderUpdate(item, index)
        {
            let dataSend = {
                'kdMenu':listPesanan[index].kdMenu, 
                'kdPesanan':kdPesanan, 
                'hargaAt' :listPesanan[index].hargaAt, 
                'qt':listPesanan[index].qt, 
                'total':listPesanan[index].total
            }
            $.post(routeToUpdateTempPesanan, dataSend, function(){});
        }
        pesanUmumApp('success', 'Updated', 'Pesanan di update...');
    }else{
        pesanUmumApp('error', 'Tidak ada pesanan', 'Periksan pesanan...');
    }
}

function updateMenu()
{
    let kdKategori = divUpdatePesanan.kategoriDipilih;
    $.post(routeToGetDataMenuKategori, {'kdKategori':kdKategori}, function(data){
        let obj = JSON.parse(data);
        let md = obj.menu;
        // CLEAR MENU
        let pjgArray = divUpdatePesanan.dataMenu.length;
        var i;
        for(i = 0; i < pjgArray; i++){
            divUpdatePesanan.dataMenu.splice(0,1);
        }
        // UPDATE MENU
        md.forEach(renderMenu);
        function renderMenu(item, index){
            divUpdatePesanan.dataMenu.push({
                kdMenu : md[index].kd_menu,
                nama : md[index].nama,
                deks : md[index].deks,
                harga : md[index].harga,
                pic : md[index].pic
            });
        }
    });
}

function getTempMenuFirst()
{
    $.post(routeToGetTempFirst, {'kdPesanan':divUpdatePesanan.kdPesanan}, function(data){
        let obj = JSON.parse(data);
        let km = obj.pesanan;
        let totalHarga = 0;
        km.forEach(renderMenu);
        function renderMenu(item, index){
            dataMenuUpdate.push(km[index].kdMenu);
            divUpdatePesanan.menuFresh.push({
                namaMenu : km[index].namaMenu,
                hargaAt : km[index].hargaAt,
                qt : km[index].qt,
                total : km[index].total,
                kdMenu : km[index].kdMenu
            });
            let total = km[index].total;
            totalHarga = parseInt(totalHarga) + parseInt(total);
        }
        divUpdatePesanan.totalHarga = totalHarga;
    });
}

function tambahItem(kdMenu, nama, harga)
{
   let cekArray = dataMenuUpdate.includes(kdMenu);
   if(cekArray === true){
    // CEK HARGA SEKARANG
    let arrayKe = dataMenuUpdate.indexOf(kdMenu);
    let hMenuNow = divUpdatePesanan.menuFresh[arrayKe].total;
    let hMenuNext = parseInt(hMenuNow) + parseInt(harga);
    divUpdatePesanan.menuFresh[arrayKe].total = hMenuNext;
    // UPDATE HARGA TOTAL
    let hUpdateNow = parseInt(divUpdatePesanan.totalHarga) + parseInt(harga);
    divUpdatePesanan.totalHarga = hUpdateNow;
    // UPDATE QUANTITY
    let qtNow = divUpdatePesanan.menuFresh[arrayKe].qt;
    let qtUpdate = parseInt(qtNow) + 1;
    divUpdatePesanan.menuFresh[arrayKe].qt = qtUpdate;
   }else{
    dataMenuUpdate.push(kdMenu);
    divUpdatePesanan.menuFresh.push({
        namaMenu : nama, 
        hargaAt : harga,
        qt : 1,
        total : harga,
        kdMenu : kdMenu
    });
    let hItemNow = parseInt(divUpdatePesanan.totalHarga) + parseInt(harga);
    divUpdatePesanan.totalHarga = hItemNow;
   }
}

function getDataPesanan()
{
    $.post(routeToGetDetailPesanan, {'kdPesanan':divUpdatePesanan.kdPesanan}, function(data){
        let obj = JSON.parse(data);
        divUpdatePesanan.namaPelanggan = obj.namaPelanggan;
        divUpdatePesanan.meja = obj.meja;
        divUpdatePesanan.jlhTamu = obj.jlhTamu;
    });
}

function setMenuKategori()
{
    divUpdatePesanan.kategoriDipilih = document.getElementById('txtKategori').value;
    divUpdatePesanan.updateMenu();
}

function hapusItem(kdMenu)
{
    let cekArray = dataMenuUpdate.includes(kdMenu);
    if(cekArray === true){
        let cekLetakArray = dataMenuUpdate.indexOf(kdMenu);
        let totalHargaAt = divUpdatePesanan.menuFresh[cekLetakArray].total;
        let tHargaNow = parseInt(divUpdatePesanan.totalHarga) - parseInt(totalHargaAt);
        divUpdatePesanan.totalHarga = tHargaNow;
        dataMenuUpdate.splice(cekLetakArray, 1);
        divUpdatePesanan.menuFresh.splice(cekLetakArray, 1);
    }else{
        pesanUmumApp('warning', 'T_T', 'Menu tidak ada dalam pesanan');
    }
}

function kembaliAtc()
{
    renderMenu(pesanan);
    divJudul.judulForm = "Daftar Pesanan"; 
}

function hapusTempLama(kdPesanan)
{
    let dataSend = {'kdPesanan':kdPesanan}
    $.post('pesanan/hapusTempLama', dataSend, function(data){});
}