var divDetailPembelianBb = new Vue({
    el : '#divDetailPembelianBb',
    data : {
        kdPembelian : '',
        namaResto : 'Memuat ...',
        alamatResto : 'Memuat ...',
        noHpResto : 'Memuat ...',
        namaMitra : 'Memuat ...',
        alamatMitra : 'Memuat ...',
        noHpMitra : 'Memuat ...',
        totalPembelian : 0,
        waktuPembelian : '',
        itemPembelian : [
            {namaProduk: 'Memuat ..', satuan: 'Memuat ..', qt : 0}
        ]
    },
    methods : {
        kembaliAtc : function()
        {
            renderMenu(pembelianBahanBaku);
            divJudul.judulForm = "Pembelian bahan baku";
        }
    }
});

//inisialisasi 
divDetailPembelianBb.kdPembelian = document.getElementById('txtKdPembelian').innerHTML;
setTimeout(renderHeader, 300);

function renderHeader()
{
    let kdPembelian = divDetailPembelianBb.kdPembelian;
    //render header
    $.post('pembelianBahanBaku/getDetailPembelian', {'kdPembelian':kdPembelian}, function(data){
        let obj = JSON.parse(data);
        divDetailPembelianBb.totalPembelian = obj.total;
        divDetailPembelianBb.namaResto = obj.namaResto;
        divDetailPembelianBb.alamatResto = obj.alamatResto;
        divDetailPembelianBb.noHpResto = obj.noHpResto;
        divDetailPembelianBb.namaMitra = obj.namaMitra;
        divDetailPembelianBb.alamatMitra = obj.alamatMitra;
        divDetailPembelianBb.noHpMitra = obj.noHpMitra;
        divDetailPembelianBb.waktuPembelian = obj.waktuPembelian;
    });
    //render list item pembelian
    $.post('pembelianBahanBaku/getItemPembelian', {'kdPembelian':kdPembelian}, function(data){
        let obj = JSON.parse(data);
        let itemPem = obj.itemPembelian;
        divDetailPembelianBb.itemPembelian.splice(0,1);
        itemPem.forEach(renderItem);
        function renderItem(item, index){
            divDetailPembelianBb.itemPembelian.push({
                nama : itemPem[index].namaBahan,
                satuan : itemPem[index].satuan,
                qt : itemPem[index].qt
            });
        }
    });
}