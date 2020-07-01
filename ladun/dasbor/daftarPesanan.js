var divPesanan = new Vue({
    el : '#divPesanan',
    data : {

    },
    methods : {
        detailPesanan : function(kdPesanan)
        {
            window.alert(kdPesanan);
        }
    }
});

//inisialisasi
$('#tblDaftarPesanan').dataTable();