var divPesanan = new Vue({
    el : '#divPesanan',
    data : {

    },
    methods : {
        bayarPesanan : function(kdPesanan)
        {
            bayarPesanan(kdPesanan);
        },
        detailPesanan : function(kdPesanan)
        {
            
        },
        updatePesanan : function(kdPesanan)
        {
            updatePesanan(kdPesanan);
        }
    }
});

//inisialisasi
$('#tblDaftarPesanan').dataTable({"order": [[ 4, "desc" ]]});

function bayarPesanan(kdPesanan)
{
    renderMenu('pembayaran/formPembayaran/'+kdPesanan);
    divJudul.judulForm = "Pembayaran";
}

function updatePesanan(kdPesanan)
{
    renderMenu('pesanan/updatePesanan/'+kdPesanan);
    divJudul.judulForm = "Update Pesanan";
}