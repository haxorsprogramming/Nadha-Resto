var divLaporanTransaksiBulan = new Vue({
    el : '#divLaporanTransaksiBulan',
    data : {

    },
    methods : {
        detailAtc : function(tahun, bulan, tanggal){
            renderMenu('laporanTransaksi/laporanTransaksiTanggal/'+tahun+'/'+bulan+'/'+tanggal);
            let judulNow = divJudul.judulForm+", Tanggal "+tanggal;
            divJudul.judulForm = judulNow;
        }
    }
});
$('#tblLaporanBulan').dataTable({"bSort" : false});