var divBahanBaku = new Vue({
    el : '#divBahanBaku',
    data : {
        nama : '',
        deks : '',
        satuan : '',
        kategori : '',
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