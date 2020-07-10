var divBeranda = new Vue({
    el : '#divBeranda',
    data : {
        menuFavorit : [],
        lastTs : []
    }
});

//get menu terlaris
$.post('dasbor/getMenuTerlaris', function(data){
    let obj = JSON.parse(data);
    let dt = obj.menuTerlaris;
    dt.forEach(renderMenu);
    function renderMenu(item, index){
        divBeranda.menuFavorit.push({
            judul : dt[index].nama,
            pic : dt[index].pic,
            deks : dt[index].deks
        });
    }
});

//get transaksi terakhir
$.post('dasbor/getTransaksiTerakhir', function(data){
    let obj = JSON.parse(data);
    let lts = obj.lt;
    lts.forEach(renderLs);
    function renderLs(item, index){
        divBeranda.lastTs.push({
            total : lts[index].total_final
        });
    }
});