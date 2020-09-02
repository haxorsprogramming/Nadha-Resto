// ROUTE
var routeToTambahPromo = server + 'promo/tambahPromo';

// VUE OBJECT 
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
            document.querySelector('#txtNamaPromo').focus();
        },
        prosesTambah : function()
        {
            this.namaPromo = document.querySelector('#txtNamaPromo').value;
            this.deks = document.querySelector('#txtDeks').value;
            this.tipe = document.querySelector('#txtTipe').value;
            this.nilai = document.querySelector('#txtNilai').value;
            this.kuota = document.querySelector('#txtKuota').value;
            this.tanggalExpired = document.querySelector('#txtTanggalExpired').value;
            if(this.namaPromo === '' || this.deks === '' || this.tipe === '' || this.nilai === '' || this.kuota === '' || this.tanggalExpired === ''){
                pesanUmumApp('warning', 'Isi field...', 'Harap isi semua field!!!');
            }else{
                prosesTambah();
            }
        },
        detailAtc : function(kdPromo)
        {
            renderMenu('promo/detailPromo/'+kdPromo);
            divJudul.judulForm = "Detail Promo";
        },
        kembaliAtc : function()
        {
            divMenu.promoAtc();
        }
    }
});

// INISIALISASI 
$('#divTambahPromo').hide();
$('#tblPromo').dataTable();

// FUNCTION 
function prosesTambah()
{
    let namaPromo = divPromo.namaPromo;
    let deks = divPromo.deks;
    let tipe = divPromo.tipe;
    let nilai = divPromo.nilai;
    let kuota = divPromo.kuota;
    let tanggalExpired = divPromo.tanggalExpired;
    let dataSend = {'namaPromo':namaPromo, 'deks':deks, 'tipe':tipe, 'nilai':nilai, 'kuota':kuota, 'tanggalExpired':tanggalExpired}

    $.post(routeToTambahPromo, dataSend, function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'error_nama_promo'){
            pesanUmumApp('error', 'Error nama promo', 'Nama promo sudah digunakan!!');
        }else if(obj.status === 'error_tanggal'){
            pesanUmumApp('error', 'Error', 'Pastikan tanggal expired yang diinput benar ... ');
        }else{
            pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan promo..');
            divPromo.kembaliAtc();
        }
    });

}