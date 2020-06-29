var divPromo = new Vue({
    el : '#divPromo',
    data : {
        namaPromo : '',
        deks : '',
        tipe : '',
        nilai : '',
        kuota : ''
    },
    methods : {
        tambahPromoAtc : function()
        {
            $('#divDataPromo').hide();
            $('#divTambahPromo').show();
            document.getElementById('txtNamaPromo').focus();
        },
        prosesTambah : function()
        {
            pesanUmumApp('success', 'test pesan', 'coba tes pesan');
        }
    }
});

//inisialisasi
$('#divTambahPromo').hide();
$('#tblPromo').dataTable();