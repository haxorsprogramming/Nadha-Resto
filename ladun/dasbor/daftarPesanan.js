var divPesanan = new Vue({
    el : '#divPesanan',
    data : {

    },
    methods : {
        bayarPesanan : function(kdPesanan)
        {
            bayarPesanan(kdPesanan);
        },
        detailPesanan : function(kdPesanan)
        {
            detailPesanan(kdPesanan);
        },
        updatePesanan : function(kdPesanan)
        {
            updatePesanan(kdPesanan);
        },
        batalkanPesanan : function(kdPesanan)
        {
            konfirmBatalkanPesan(kdPesanan);
        }
    }
});

//inisialisasi
// $('#tblDaftarPesanan').dataTable({"order": [[ 4, "desc" ]]});

function konfirmBatalkanPesan(kdPesanan)
{
    Swal.fire({
        title: "Batalkan pesanan?",
        text: "Yakin membatalkan pesanan?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
            batalkanPesanan(kdPesanan);
        }
      });
}

function batalkanPesanan(kdPesanan)
{
    let dataSend = {'kdPesanan':kdPesanan}
    $.post('pesanan/batalkanPesanan', dataSend, function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'sukses'){
            pesanUmumApp('success', 'Sukses', 'Berhasil membatalkan pesanan');
            renderMenu(pesanan);
            divJudul.judulForm = "Daftar Pesanan"; 
        }
    });
}

function detailPesanan(kdPesanan)
{
    renderMenu('pesanan/detailPesanan/'+kdPesanan);
    divJudul.judulForm = "Detail Pesanan";
}

function bayarPesanan(kdPesanan)
{
    renderMenu('pembayaran/formPembayaran/'+kdPesanan);
    divJudul.judulForm = "Pembayaran";
}

function updatePesanan(kdPesanan)
{
    renderMenu('pesanan/updatePesanan/'+kdPesanan);
    divJudul.judulForm = "Update Pesanan";
}