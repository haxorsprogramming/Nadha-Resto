var divPromo = new Vue({
    el : '#divPromo',
    data : {
        namaPromo : '',
        deks : '',
        tipe : '',
        nilai : '',
        kuota : '',
        tanggalExpired : '',
        manajemenPromo : [
            {teks : 'Promo digunakan untuk menarik pelanggan'},
            {teks : 'Gunakan regex {promo_code}, dalam broadcast pesan untuk menampilkan detail promo'},
            {teks : 'Promo akan nonaktif apabila telah memasuki tanggal akhir/kuota habis'}
        ]
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
            this.namaPromo = document.getElementById('txtNamaPromo').value;
            this.deks = document.getElementById('txtDeks').value;
            this.tipe = document.getElementById('txtTipe').value;
            this.nilai = document.getElementById('txtNilai').value;
            this.kuota = document.getElementById('txtKuota').value;
            this.tanggalExpired = document.getElementById('txtTanggalExpired').value;
            if(this.namaPromo === '' || this.deks === '' || this.tipe === '' || this.nilai === '' || this.kuota === '' || this.tanggalExpired === ''){
                pesanUmumApp('warning', 'Isi field...', 'Harap isi semua field!!!');
            }else{
                prosesTambah();
            }
        },
        kembaliAtc : function()
        {
            renderMenu(promo);
            divJudul.judulForm = "Promo";
        }
    }
});

//inisialisasi
$('#divTambahPromo').hide();
$('#tblPromo').dataTable();

function prosesTambah()
{
    let namaPromo = divPromo.namaPromo;
    let deks = divPromo.deks;
    let tipe = divPromo.tipe;
    let nilai = divPromo.nilai;
    let kuota = divPromo.kuota;
    let tanggalExpired = divPromo.tanggalExpired;
    let dataSend = {'namaPromo':namaPromo, 'deks':deks, 'tipe':tipe, 'nilai':nilai, 'kuota':kuota, 'tanggalExpired':tanggalExpired}

    $.post('promo/tambahPromo', dataSend, function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'error_nama_promo'){
            pesanUmumApp('error', 'Error nama promo', 'Nama promo sudah digunakan!!');
        }else{
            pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan promo..');
            divPromo.kembaliAtc();
        }
    });

}