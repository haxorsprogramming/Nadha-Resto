var divLaporanTransaksiAwal = new Vue({
    el : '#divLaporanTransaksiAwal',
    data : {

    },
    methods : {
        detailAtc : function(tahun){
            renderMenu('laporanTransaksi/laporanTransaksiTahun/'+tahun);
            divJudul.judulForm = "Laporan Transaksi Tahun "+tahun;
        }
    }
});

$('#tblLaporanAwal').dataTable();