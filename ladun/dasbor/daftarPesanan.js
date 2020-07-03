var divPesanan = new Vue({
    el : '#divPesanan',
    data : {

    },
    methods : {
        detailPesanan : function(kdPesanan)
        {
            renderMenu('pembayaran/formPembayaran/'+kdPesanan);
            divJudul.judulForm = "Pembayaran";
        }
    }
});

//inisialisasi
$('#tblDaftarPesanan').dataTable();