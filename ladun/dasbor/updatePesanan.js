var dataMenuUpdate = [];
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
           
        },
        hapusItem : function(kdMenu)
        {
            hapusItem(kdMenu);
        },
        tambahItem(kdMenu, nama, harga)
        {
            tambahItem(kdMenu, nama, harga);
        }
    }
});

//inisialisasi 
divUpdatePesanan.kdPesanan = document.getElementById('txtKdPesanan').innerHTML;
setTimeout(getDataPesanan, 200);
setTimeout(getTempMenuFirst, 200);

//get data kategori
$.post('utility/getDataKategori', function(data){
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

function updateMenu()
{
    let kdKategori = divUpdatePesanan.kategoriDipilih;
    $.post('utility/getDataMenuKategori', {'kdKategori':kdKategori}, function(data){
        let obj = JSON.parse(data);
        let md = obj.menu;
        //clear menu 
        let pjgArray = divUpdatePesanan.dataMenu.length;
        var i;
        for(i = 0; i < pjgArray; i++){
            divUpdatePesanan.dataMenu.splice(0,1);
        }
        //update menu
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
    $.post('pesanan/getTempFirst', {'kdPesanan':divUpdatePesanan.kdPesanan}, function(data){
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

   }else{
    dataMenuUpdate.push(kdMenu);
    divUpdatePesanan.menuFresh.push({
        namaMenu : nama, 
        hargaAt : harga,
        qt : 1,
        total : harga,
        kdMenu : kdMenu
    });
   }
}

function getDataPesanan()
{
    $.post('pesanan/getDetailPesanan', {'kdPesanan':divUpdatePesanan.kdPesanan},  function(data){
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
        // console.log(totalHargaAt);
        let tHargaNow = parseInt(divUpdatePesanan.totalHarga) - parseInt(totalHargaAt);
        divUpdatePesanan.totalHarga = tHargaNow;
        dataMenuUpdate.splice(cekLetakArray, 1);
        divUpdatePesanan.menuFresh.splice(cekLetakArray, 1);
    }else{
        pesanUmumApp('warning', 'T_T', 'Menu tidak ada dalam pesanan');
    }
}