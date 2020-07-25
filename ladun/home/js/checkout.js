const server = 'http://localhost/Nadha-Resto/';
// Your web app's Firebase configuration -> ganti dengan settingan firebase anda
var firebaseConfig = {
    apiKey: "AIzaSyAueZTSpNcbl7XGou5y0kwVaWpwHiScVPY",
    authDomain: "nadhamedia.firebaseapp.com",
    databaseURL: "https://nadhamedia.firebaseio.com",
    projectId: "nadhamedia",
    storageBucket: "nadhamedia.appspot.com",
    messagingSenderId: "368827698714",
    appId: "1:368827698714:web:696bfe0e10abd1f477cba3"
  };

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
var db = firebase.database();
var pesananCol = db.ref('pesanan'); 

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
            Swal.fire({
                title: "Konfirmasi",
                text: "Apakah data data anda sudah benar? Proses transaksi?",
                icon: "info",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
              }).then((result) => {
                if (result.value) {
                    let dataSend = {'email':email, 'nama':nama, 'alamat':alamat, 'hp':hp, 'tipePembayaran':tipePembayaran, 'kdPesanan':kdPesanan}
                    $.post(server+'home/deliveryOrderProses', dataSend,  function(data){
                        let obj = JSON.parse(data);
                        db.ref('pesanan/'+kdPesanan).set({
                            kd : kdPesanan,
                            email : email
                          });
                        pesanUmumApp('success','Pemesanan sukses', 'Pemesanan anda telah di proses, silahkan cek email anda untuk mendapatkan informasi pemesanan');
                    });
                }
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