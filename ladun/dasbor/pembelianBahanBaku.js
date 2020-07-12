var divPembelian = new Vue({
    el : '#divPembelian',
    data : {
        itemBahanBaku : []
    },
    methods : {
        tambahPembelianAtc : function()
        {
            tambahPembelian();
        },
        kembaliAtc : function()
        {
            kembali();
        }
    }
});

//inisialisasi 
$('#pembelianBaru').hide();

function tambahPembelian()
{
    $('#historyPembelian').hide();
    $('#pembelianBaru').show();
}

function kembali()
{
    renderMenu(pembelianBahanBaku);
    divJudul.judulForm = "Pembelian bahan baku";
}