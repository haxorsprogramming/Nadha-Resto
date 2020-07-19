//inisialisasi 
$('#txtDeliveryInfo').hide();

document.getElementById('txtTipePesanan').addEventListener("change", function(){
    let tipePesanan = document.getElementById('txtTipePesanan').value;
    if(tipePesanan === 'dinein'){
        cekDiResto(tipePesanan);
    }else if(tipePesanan === 'delivery'){
        $('#txtDeliveryInfo').show();
        document.getElementById('txtNamaLengkapDo').focus();
    }else if(tipePesanan === 'takehome'){
        cekDiResto(tipePesanan);
    }else{
        $('#txtDeliveryInfo').hide();
    }
});

function cekDiResto(tipePesanan)
{
    Swal.fire({
        title: "Cek lokasi..",
        text: "Apakah anda sudah di berada restoran?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
           
        }
      });
}