var divPembelian = new Vue({
    el : '#divPembelian',
    data : {
        itemBahanBaku : [],
        kategoriDipilih : '',
        itemDipilih : []
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
        }
    }
});

//inisialisasi 
$('#pembelianBaru').hide();
var arrItemDipilih = [];
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