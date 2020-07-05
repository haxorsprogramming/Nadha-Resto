var divPesanan = new Vue({
    el : '#divPesanan',
    data : {

    },
    methods : {
        bayarPesanan : function(kdPesanan)
        {
            renderMenu('pembayaran/formPembayaran/'+kdPesanan);
            divJudul.judulForm = "Pembayaran";
        },
        detailPesanan : function(kdPesanan)
        {
            
        },
        updatePesanan : function(kdPesanan)
        {
            renderMenu('pesanan/updatePesanan/'+kdPesanan);
            divJudul.judulForm = "Update Pesanan";
        }
    }
});

//inisialisasi
$('#tblDaftarPesanan').dataTable({"order": [[ 4, "desc" ]]});