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
            window.alert(kdPesanan);
        }
    }
});

//inisialisasi
$('#tblDaftarPesanan').dataTable({"order": [[ 5, "desc" ]]});