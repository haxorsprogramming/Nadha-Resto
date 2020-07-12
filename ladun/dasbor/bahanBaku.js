var divBahanBaku = new Vue({
    el : '#divBahanBaku',
    data : {

    },
    methods : {
        tambahBahanBakuAtc : function()
        {
            $('#divTambahBahanBaku').show();
            $('#divBahanBaku').hide();
        }
    }
});

//inisialisasi 
$('#divTambahBahanBaku').hide();
$('#tblBahanBakuAtc').dataTable();