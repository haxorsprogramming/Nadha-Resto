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
            tampilFormTambahBahanBaku();
        }
    }
});

//inisialisasi 
$('#divTambahBahanBaku').hide();
$('#tblBahanBakuAtc').dataTable();

function tampilFormTambahBahanBaku()
{
    $('#divTambahBahanBaku').show();
    $('#divBahanBaku').hide();
    document.getElementById('txtNamaBahan').focus();
}