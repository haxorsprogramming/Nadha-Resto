var arrItemDipilih = [];
var divPembelian = new Vue({
    el : '#divPembelian',
    data : {
        itemBahanBaku : [],
        kategoriDipilih : '',
        itemDipilih : [],
        mitra : ''
    },
    methods : {
        tambahPembelianAtc : function()
        {
            tambahPembelian();
        },
        kembaliAtc : function()
        {
            kembali();
        },
        setItem : function()
        {
            setItem(this.kategoriDipilih);
        },
        tambahItemAtc : function(kdBahan, satuan, nama)
        {
            tambahItem(kdBahan, satuan, nama);
        },
        hapusItemAtc : function(kdBahan)
        {
            hapusItem(kdBahan);
        }
    }
});

//inisialisasi 
$('#pembelianBaru').hide();
$(".select2").select2();

function setMitra()
{
    divPembelian.mitra = document.getElementById('txtMitra').value;
}

function hapusItem(kdBahan)
{
    let cekArray = arrItemDipilih.includes(kdBahan);
    if(cekArray === true){
        let cekPos = arrItemDipilih.indexOf(kdBahan);
        console.log(cekPos);
        arrItemDipilih.splice(cekPos, 1);
        divPembelian.itemDipilih.splice(cekPos, 1);
    }else{
        pesanUmumApp('warning', 'No item', 'Tidak ada item untuk dihapus!!');
    }
}

function tambahItem(kdBahan, satuan, nama)
{
    let valueItem = document.getElementById(kdBahan).value;
    let cekArray = arrItemDipilih.includes(kdBahan);
    if(cekArray === true){
        let cekPos = arrItemDipilih.indexOf(kdBahan);
        divPembelian.itemDipilih[cekPos].value = valueItem;
    }else{
        if(valueItem === '' || valueItem === '0'){
            pesanUmumApp('warning', 'Isi nilai', 'Masukkan nilai item!!');
        }else{
            arrItemDipilih.push(kdBahan);
            divPembelian.itemDipilih.push({
                nama : nama,
                satuan : satuan,
                value : valueItem
            });
        }
    }
    console.log(arrItemDipilih);
}

function setItem(kategori)
{
    $.post('pengeluaran/getDataBahanBakuKategori', {'kategori':kategori}, function(data){
        let obj = JSON.parse(data);
        let bb = obj.bahanBaku;
        let pjgArray = divPembelian.itemBahanBaku.length;
        var i;
        for(i = 0; i < pjgArray; i++){
            divPembelian.itemBahanBaku.splice(0,1);
        }
        bb.forEach(renderItem);
        function renderItem(item, index)
        {
            divPembelian.itemBahanBaku.push({
                nama : bb[index].nama,
                satuan : bb[index].satuan,
                kdBahan : bb[index].kd_bahan
            });
        }
    });
}

function setKategori()
{
   divPembelian.kategoriDipilih = document.getElementById('txtKategori').value;
   $('.txtNilai').val('');
   divPembelian.setItem();
}

function tambahPembelian()
{
    $('#historyPembelian').hide();
    $('#pembelianBaru').show();
}

function kembali()
{
    renderMenu(pembelianBahanBaku);
    divJudul.judulForm = "Pembelian bahan baku";
}