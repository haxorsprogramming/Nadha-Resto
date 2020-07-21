const server = 'http://localhost/Nadha-Resto/';

var divCart = new Vue({
    el : '#divCart',
    data : {
        tipePesanan : 'none',
        tipePembayaran : 'none',
        pd : [{nama : '', hp : '', alamat : '', email : ''}],
        kdPesanan : ''
    },
    methods : {
        pesanAtc : function()
        {
            if(this.tipePesanan === 'none'){
                pesanUmumApp('warning', 'Pilih pesanan', 'Harap pilih pesanan!!!');
            }else{
                setNGoDelivery();
            }
        }
    }
});
//inisialisasi 
$('#txtDeliveryInfo').hide();
divCart.kdPesanan = document.getElementById('txtKdPesananHidden').value;
var socket = io('http://localhost:2501');

function setNGoDelivery()
{
    divCart.pd[0].email = document.getElementById('txtEmailPd').value;
    divCart.pd[0].nama = document.getElementById('txtNamaLengkapPd').value;
    divCart.pd[0].alamat = document.getElementById('txtAlamatPd').value;
    divCart.pd[0].hp = document.getElementById('txtHpPd').value;
    //grab the all value
    let email =  divCart.pd[0].email;
    let nama = divCart.pd[0].nama;
    let alamat = divCart.pd[0].alamat;
    let hp = divCart.pd[0].hp;
    let tipePembayaran = divCart.tipePembayaran;
    let kdPesanan = divCart.kdPesanan;
    if(email === '' || nama === '' || alamat === '' || hp === ''){
        pesanUmumApp('warning', 'Isi field!!', 'Harap isi semua field!!');
    }else{
        if(tipePembayaran === 'none'){
            pesanUmumApp('warning', 'Pilih pembayaran!!', 'Pilih metode pembayaran!!');
        }else{
            let dataSend = {'email':email, 'nama':nama, 'alamat':alamat, 'hp':hp, 'tipePembayaran':tipePembayaran, 'kdPesanan':kdPesanan}
            $.post(server+'home/deliveryOrderProses', dataSend,  function(data){
                let obj = JSON.parse(data);
                let status = 'masuk';
                socket.emit('status', status);
                // console.log(obj);
            });
        }
    }
}

document.getElementById('txtTipePesanan').addEventListener("change", function(){
    let tipePesanan = document.getElementById('txtTipePesanan').value;
    divCart.tipePesanan = tipePesanan;
    if(tipePesanan === 'dinein'){
        cekDiResto(tipePesanan);
    }else if(tipePesanan === 'delivery'){
        $('#txtDeliveryInfo').show();
        document.getElementById('txtNamaLengkapPd').focus();
    }else if(tipePesanan === 'takehome'){
        cekDiResto(tipePesanan);
    }else{
        $('#txtDeliveryInfo').hide();
    }
});

document.getElementById('txtTipePembayaran').addEventListener("change", function(){
    let tipePembayaran = document.getElementById('txtTipePembayaran').value;
    divCart.tipePembayaran = tipePembayaran;
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

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}