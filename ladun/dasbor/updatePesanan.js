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
        jlhTamu : 'memuat...'
    },
    methods : {
        updateMenu : function()
        {
            updateMenu();
        },
        updateAtc : function()
        {
            // window.alert(this.kdPesanan);
        }
    }
});

//inisialisasi 
divUpdatePesanan.kdPesanan = document.getElementById('txtKdPesanan').innerHTML;
setTimeout(getDataPesanan, 200);
setTimeout(getTempMenuFirst, 200);
var dataMenuUpdate = [];
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
//get data pesanan 

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
        km.forEach(renderMenu);
        function renderMenu(item, index){
            dataMenuUpdate.push(km[index].kdMenu);
            divUpdatePesanan.menuFresh.push({
                namaMenu : km[index].namaMenu,
                hargaAt : km[index].hargaAt,
                qt : km[index].qt,
                total : km[index].total
            });
        }
        console.log(dataMenuUpdate);
    });
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
