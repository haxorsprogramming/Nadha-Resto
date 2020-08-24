var divMenuResto = new Vue({
    el : '#divMenuResto',
    data : {

    },
    methods : {
        tambahMenuAtc : function()
        {
            renderMenu('menu/tambahMenu');
            divJudul.judulForm = "Tambah Menu Restoran"; 
        },
        detailAtc : function(kdMenu, namaMenu)
        {
            divJudul.judulForm = "Detail Menu "+ namaMenu;
            renderMenu('menu/detailMenu/'+kdMenu);
        }
    }
});

$('#tblMenu').DataTable();
