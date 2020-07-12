var divBahanBaku = new Vue({
    el : '#divBahanBaku',
    data : {
        nama : '',
        deks : '',
        satuan : 'karbo',
        kategori : 'kg',
        stok : 0
    },
    methods : {
        tambahBahanBakuAtc : function()
        {
            tampilFormTambahBahanBaku();
        },
        simpanAtc : function()
        {
           simpan();
        },
        kembaliAtc : function()
        {
            kembali();
        }
    }
});

//inisialisasi 
$('#divTambahBahanBaku').hide();
$('#tblBahanBakuAtc').dataTable();

function simpan()
{
    let nama = divBahanBaku.nama;
    let deks = divBahanBaku.deks;
    let satuan = divBahanBaku.satuan;
    let kategori = divBahanBaku.kategori;
    let stok = divBahanBaku.stok;

    if(nama === '' || deks === '' || stok === ''){
        pesanUmumApp('warning', 'Isi field!!', 'Harap isi semua field!!');
    }else{
        let dataSend = {'nama':nama, 'deks':deks, 'satuan':satuan, 'kategori':kategori, 'stok':stok}
        $.post('bahanBaku/tambahBahanBaku', dataSend, function(data){
            let obj = JSON.parse(data);
            console.log(obj);
        });
    }
}

function kembali()
{
    renderMenu(bahanBaku);
    divJudul.judulForm = "Bahan Baku";
}

function tampilFormTambahBahanBaku()
{
    $('#divTambahBahanBaku').show();
    $('#divListBahanBaku').hide();
    divJudul.judulForm = "Tambah bahan baku";
    document.getElementById('txtNamaBahan').focus();
}