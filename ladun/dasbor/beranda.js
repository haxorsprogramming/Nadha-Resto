var divBeranda = new Vue({
    el : '#divBeranda',
    data : {
        menuFavorit : []
    }
});

//get menu terlaris
$.post('dasbor/getMenuTerlaris', function(data){
    let obj = JSON.parse(data);
    let dt = obj.menuTerlaris;
    dt.forEach(renderMenu);
    function renderMenu(item, index){

    }
});
