var divPengeluaran = new Vue({
    el : '#divPengeluaran',
    data : {
        namaPengeluaran : '',
        deksripsi : '',
        kategori : '',
        
    },
    methods : {
        tambahPengeluaranAtc : function()
        {
            tampilFormTambahPengeluaran();
        },
        kembaliAtc : function()
        {
            divMenu.pengeluaranAtc();
        },
        simpanAtc : function()
        {
            konfirmasiSimpan();
        }
    }
});


//inisialisasi 
$('#tblHistoryPengeluaran').dataTable();
$('#divTambahPengeluaran').hide();

function konfirmasiSimpan()
{
    // divPengeluaran.
}

function tampilFormTambahPengeluaran()
{
    $('#divHistoryPengeluaran').hide();
    $('#divTambahPengeluaran').show();
    document.getElementById('txtNamaPengeluaran').focus();
}