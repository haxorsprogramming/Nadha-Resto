var divPromo = new Vue({
    el : '#divPromo',
    data : {

    },
    methods : {
        tambahPromoAtc : function()
        {
            $('#divDataPromo').hide();
            $('#divTambahPromo').show();
        }
    }
});

//inisialisasi
$('#divTambahPromo').hide();
$('#tblPromo').dataTable();