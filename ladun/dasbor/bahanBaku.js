// ROUTE
var routeToAddBahanBaku = server + "bahanBaku/tambahBahanBaku";

// VUE OBJECT 
var divBahanBaku = new Vue({
    el : '#divBahanBaku',
    data : {
        nama : '',
        deks : '',
        satuan : '',
        kategori : '',
        stok : 0,
        tentangBahan : [
            {teks : 'Manajemen bahan baku digunakan untuk mendata stok bahan bahan untuk produk resto'},
            {teks : 'Pembelian bahan baku akan menambah stok dari bahan baku'},
            {teks : 'Lakukan update stok bahan baku seebelum melakukan pembelian bahan baku'}
        ]
    },
    methods : {
        tambahBahanBakuAtc : function()
        {
            tampilForm();
        },
        simpanAtc : function()
        {
            simpan();
        },
        kembaliAtc : function()
        {
            kembali();
        },
        clearAtc : function()
        {
            clear();
        },
        detailAtc : function(kdBahan)
        {
            divJudul.judulForm = "Detail Bahan Baku";
            renderMenu('bahanBaku/detailBahanBaku/'+kdBahan);
        }
    }
});

// INISIALISASI 
$('#divTambahBahanBaku').hide();
$('#tblBahanBakuAtc').dataTable();

// FUNCTION 
function simpan()
{
    let nama = divBahanBaku.nama;
    let deks = divBahanBaku.deks;
    let satuan = divBahanBaku.satuan;
    let kategori = divBahanBaku.kategori;
    let stok = divBahanBaku.stok;

    if(nama === '' || deks === '' || stok === '' || satuan === '' || kategori === ''){
        pesanUmumApp('warning', 'Isi field!!', 'Harap isi semua field!!');
    }else{
        let dataSend = {'nama':nama, 'deks':deks, 'satuan':satuan, 'kategori':kategori, 'stok':stok}
        $.post(routeToAddBahanBaku, dataSend, function(data){
            let obj = JSON.parse(data);
            if(obj.status === 'error'){
                pesanUmumApp('warning', 'Error', 'Nama bahan sudah ada!!');
            }else{
                pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan bahan baku');
                renderMenu(bahanBaku);
                divJudul.judulForm = "Bahan Baku";
            }
        });
    }
}

function clear()
{
    divBahanBaku.nama = '';
    divBahanBaku.deks = '';
    divBahanBaku.satuan = '';
    divBahanBaku.kategori = '';
    divBahanBaku.stok = 0;
    document.getElementById('txtNamaBahan').focus();
}

function kembali()
{
    renderMenu(bahanBaku);
    divJudul.judulForm = "Bahan Baku";
}

function tampilForm()
{
    $('#divTambahBahanBaku').show();
    $('#divListBahanBaku').hide();
    divJudul.judulForm = "Tambah bahan baku";
    document.getElementById('txtNamaBahan').focus();
}