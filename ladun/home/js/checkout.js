// ROUTE 
var routeToFirebaseSetting = server + "utility/getFirebaseSetting";
var deliveryOrderProses = server + "home/deliveryOrderProses";

// VUE OBJECT 
var divCart = new Vue({
    el : '#divCart',
    data : {
        tipePesanan : 'none',
        tipePembayaran : 'none',
        pd : [{nama : '', hp : '', alamat : '', email : ''}],
        kdPesanan : '',
        apiKey : '',
        authDomain : '',
        databaseURL : '',
        projectId : '',
        storageBucket : '',
        messagingSenderId : '',
        appId : ''
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

// INISIALISASI
$('#statButtonPesan').hide();  
$('#txtDeliveryInfo').hide();
$('#btnPesanSekarang').hide();
$('#divTipePembayaran').hide();
divCart.kdPesanan = document.getElementById('txtKdPesananHidden').value;

$.post(routeToFirebaseSetting, function(data){
    let obj = JSON.parse(data);
    divCart.apiKey = obj.apiKey;
    divCart.authDomain = obj.authDomain;
    divCart.databaseURL = obj.databaseURL;
    divCart.projectId = obj.projectId;
    divCart.storageBucket = obj.storageBucket;
    divCart.messagingSenderId = obj.messagingSenderId;
    divCart.appId = obj.appId;
});

// FUNCTION 
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
                    //firebase inisialisasi
                    var firebaseConfig = {
                        apiKey: divCart.apiKey,
                        authDomain: divCart.authDomain,
                        databaseURL: divCart.databaseURL,
                        projectId: divCart.projectId,
                        storageBucket: divCart.storageBucket,
                        messagingSenderId: divCart.messagingSenderId,
                        appId: divCart.appId
                    };
                    // Initialize Firebase
                    firebase.initializeApp(firebaseConfig);
                    var db = firebase.database();
                    var pesananCol = db.ref('pesanan'); 

                    let dataSend = {'email':email, 'nama':nama, 'alamat':alamat, 'hp':hp, 'tipePembayaran':tipePembayaran, 'kdPesanan':kdPesanan}
                    $('#btnPesanSekarang').hide();
                    $('#statButtonPesan').show();
                    $(".form-control").attr("disabled", "disabled");
                    $.post(deliveryOrderProses, dataSend, function(data){
                        let obj = JSON.parse(data);
                        db.ref('pesanan/'+kdPesanan).set({
                            kd : kdPesanan,
                            email : email,
                            alamat : alamat
                          });
                        pesanUmumApp('success','Pemesanan sukses', 'Pemesanan anda telah di proses, silahkan cek email anda untuk mendapatkan informasi pemesanan');
                        setTimeout(function(){
                            window.location.assign(server+'home/konfirmasi');
                        }, 1000);
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
        $('#divTipePembayaran').hide();
        $('#btnPesanSekarang').show();
        $('#txtDeliveryInfo').show();
        $('#divTipePembayaran').show();
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
    $('#txtDeliveryInfo').hide();
    Swal.fire({
        title: "Konfirmasi lokasi..",
        text: "Apakah anda sudah di berada restoran?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
            let kdPesanan = divCart.kdPesanan;
            console.log(kdPesanan);
        }else{
            pesanUmumApp('info', 'Order di resto', 'Silahkan order di restoran untuk memastikan ketersediaan meja/menu ...');
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