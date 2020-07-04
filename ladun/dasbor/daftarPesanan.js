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
            
        }
    }
});

//inisialisasi
$('#tblDaftarPesanan').dataTable();