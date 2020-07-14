var divPengeluaran = new Vue({
    el : '#divPengeluaran',
    data : {

    },
    methods : {
        tambahPengeluaranAtc : function()
        {
            tampilFormTambahPengeluaran();
        },
        kembaliAtc : function()
        {
            divMenu.pengeluaranAtc();
        }
    }
});


//inisialisasi 
$('#tblHistoryPengeluaran').dataTable();
$('#divTambahPengeluaran').hide();

function tampilFormTambahPengeluaran()
{
    $('#divHistoryPengeluaran').hide();
    $('#divTambahPengeluaran').show();
    document.getElementById('txtNamaPengeluaran').focus();
}