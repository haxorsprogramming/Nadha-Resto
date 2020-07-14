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
setTimeout(renderHeader, 400);

function renderHeader()
{
    let kdPembelian = divDetailPembelianBb.kdPembelian;
    $.post('pengeluaran/getDetailPembelian', {'kdPembelian':kdPembelian}, function(data){
        let obj = JSON.parse(data);
        divDetailPembelianBb.totalPembelian = obj.total;
        divDetailPembelianBb.namaResto = obj.namaResto;
        divDetailPembelianBb.alamatResto = obj.alamatResto;
        divDetailPembelianBb.noHpResto = obj.noHpResto;
        console.log(obj);
    });
}