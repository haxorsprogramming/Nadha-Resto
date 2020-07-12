var divBahanBaku = new Vue({
    el : '#divBahanBaku',
    data : {
        namaBahan : '',
        deks : '',
        satuan : '',
        kategori : '',
        stok : ''
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