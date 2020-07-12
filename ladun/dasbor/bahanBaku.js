var divBahanBaku = new Vue({
    el : '#divBahanBaku',
    data : {
        nama : '',
        deks : '',
        satuan : '',
        kategori : '',
        stok : 0
    },
    methods : {
        tambahBahanBakuAtc : function()
        {
            tampilFormTambahBahanBaku();
        },
        simpanAtc : function()
        {
            this.stok = parseInt(this.stok) + 1;
            console.log(this.stok);
        },
        kembaliAtc : function()
        {

        }
    }
});

//inisialisasi 
$('#divTambahBahanBaku').hide();
$('#tblBahanBakuAtc').dataTable();

function tampilFormTambahBahanBaku()
{
    $('#divTambahBahanBaku').show();
    $('#divListBahanBaku').hide();
    divJudul.judulForm = "Tambah bahan baku";
    document.getElementById('txtNamaBahan').focus();
}