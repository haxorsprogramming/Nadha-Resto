var divPesanan = new Vue({
    el : '#divPesanan',
    data : {
        pageNow : 0,
        pageMax : 0,
        halaman : [{no : 1}],
        dataPesanan : []
    },
    methods : {
        prevAtc : function()
        {

        },
        nextAtc : function()
        {
            
        },
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
var pt;
for(pt = 0; pt < 10; pt++){
    divPesanan.dataPesanan.push({pesanan : '', tipe : '', meja : '', tamu : '', waktu : '', pembayaran : '', pelanggan : ''});
}

var startPage = 1;
setTimeout(function(){getPesanan(startPage);}, 300);

function getPesanan(page){
    var j;
    for(j = 0; j < parseInt(divPesanan.dataPesanan.length); j++){
        divPesanan.dataPesanan[j].pesanan = '';
        divPesanan.dataPesanan[j].tipe = '';
        divPesanan.dataPesanan[j].meja = '';
        divPesanan.dataPesanan[j].tamu = '';
        divPesanan.dataPesanan[j].waktu = '';
        divPesanan.dataPesanan[j].pembayaran = '';
        divPesanan.dataPesanan[j].pelanggan = '';
    }
    setTimeout(function(){
        $.post('pesanan/getPesanan/'+page, function(data){
            let obj = JSON.parse(data);
            let status = obj.status;

            if(status === 'success'){
                let pesanan = obj.pesanan;
                let pjg = obj.pesanan.length;
                let pjgArr = divPesanan.dataPesanan.length;
                console.log(pesanan);
                //clear tabel sebelumnya 
                var h;
                for(h = 0; h < parseInt(pjgArr); h++){
                    divPesanan.dataPesanan.splice(0, 1);
                }
                //push skeleton screen 
                var ut;
                for(ut = 0; ut < parseInt(pjg); ut++){
                    divPesanan.dataPesanan.push({pesanan : '', tipe : '', meja : '', tamu : '', waktu : '', pembayaran : '', pelanggan : ''});
                }
                //push data
                var i;
                for(i = 0; i < parseInt(pjg); i++){
                    divPesanan.dataPesanan[i].pesanan = pesanan[i].kdPesanan;
                    divPesanan.dataPesanan[i].pelanggan = pesanan[i].namaPelanggan;
                }  
            }else{
                var k;
                for(k = 0; k < 10; k++){
                    divPesanan.dataPesanan.splice(0, 1);
                }
            }
        });
    }, 200);
}

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