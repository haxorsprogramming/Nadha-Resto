var divLaporanTransaksiTahun = new Vue({
    el : '#divLaporanTransaksiTahun',
    data : {

    },
    methods : {
        detailAtc : function(tahun, bulan, bulanCap){
            renderMenu('laporanTransaksi/laporanTransaksiBulan/'+tahun+'/'+bulan);
            divJudul.judulForm = "Laporan Transaksi Tahun "+tahun+", Bulan "+bulanCap;
        }
    }
});

$('#tblLaporanTahun').dataTable({"bSort" : false});