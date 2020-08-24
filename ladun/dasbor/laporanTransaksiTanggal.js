$('#tblLaporanTanggal').dataTable({"bSort" : false});

$('#tblLaporanTanggal').on('click', '.btnDetail', function(){
    let kdTransaksi = $(this).data('id');
    renderMenu("arusKas/detailArusKas/"+kdTransaksi);
    divJudul.judulForm = "Detail Arus Kas"; 
});