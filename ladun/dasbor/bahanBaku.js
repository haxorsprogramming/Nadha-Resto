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
        editAtc : function(kdBahan)
        {
            console.log(kdBahan);
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
        // console.log(dataSend);
        $.post('bahanBaku/tambahBahanBaku', dataSend, function(data){
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