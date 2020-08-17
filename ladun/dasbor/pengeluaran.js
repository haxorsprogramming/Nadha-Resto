//route 
var routeToGetPengeluaran = server+'pengeluaran/getDataPengeluaran';

var divPengeluaran = new Vue({
    el : '#divPengeluaran',
    data : {
        namaPengeluaran : '',
        deksripsi : '',
        kategori : '',
        total : 0
    },
    methods : {
        tambahPengeluaranAtc : function()
        {
            tampilFormTambahPengeluaran();
        },
        kembaliAtc : function()
        {
            divMenu.pengeluaranAtc();
        },
        simpanAtc : function()
        {
            konfirmasiSimpan();
        }
    }
});


//inisialisasi 
$('#tblHistoryPengeluaran').dataTable({
    "searching" : false,
    "processing" : true,
    "serverSide": true,
    "ajax":{
        url : routeToGetPengeluaran,
        type: "post",
        error: function(){
            pesanUmumApp('warning', 'Error', 'Error menampilkan data');
        }
    }
});
$('#divTambahPengeluaran').hide();
var total = document.getElementById('txtTotal');

$('#tblHistoryPengeluaran').on('click', '.btnDetail', function(){
    let kdTransaksi = $(this).data('id');
    renderMenu("pengeluaran/detailPengeluaran/"+kdTransaksi);
    divJudul.judulForm = "Detail Pengeluaran"; 
});

function konfirmasiSimpan()
{
    divPengeluaran.namaPengeluaran = document.getElementById('txtNamaPengeluaran').value;
    divPengeluaran.deksripsi = document.getElementById('txtDeksripsi').value;
    divPengeluaran.kategori = document.getElementById('txtKategori').value;
    divPengeluaran.total = document.getElementById('txtTotal').value;
    if(divPengeluaran.namaPengeluaran === '' || divPengeluaran.deksripsi === '' || divPengeluaran.kategori === '' || divPengeluaran.total === '' || divPengeluaran.total === '0'){
        pesanUmumApp('error', 'warning', 'Isi field!!!');
    }else{
        Swal.fire({
            title: "Konfirmasi pengeluaran?",
            text: "Proses data pengeluaran baru?",
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya",
            cancelButtonText: "Tidak",
          }).then((result) => {
            if(result.value) {
                prosesPengeluaran();
            }
          });
    }
}

total.addEventListener('keyup', function(e){
    divPengeluaran.total = this.value;
    total.value = formatRupiah(this.value, 'Rp.');
});

function prosesPengeluaran()
{
    let dataSend = {'nama':divPengeluaran.namaPengeluaran, 'deks':divPengeluaran.deksripsi, 'kategori':divPengeluaran.kategori, 'total':divPengeluaran.total}
    $.post('pengeluaran/prosesPengeluaran', dataSend, function(data){
        let obj = JSON.parse(data);
        pesanUmumApp('success', 'Sukses', 'Data pengeluaran baru berhasil ditambahkan..');
        divMenu.pengeluaranAtc();
    });
}

function tampilFormTambahPengeluaran()
{
    $('#divHistoryPengeluaran').hide();
    $('#divTambahPengeluaran').show();
    document.getElementById('txtNamaPengeluaran').focus();
}

function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
}