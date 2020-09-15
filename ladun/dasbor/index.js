// ROUTE 
const beranda = 'dasbor/beranda';
const monitoring = 'monitoring';
const menu = 'menu';
const pelanggan = 'pelanggan';
const meja = 'meja';
const promo = 'promo';
const pesanan = 'pesanan/1';
const pesananBaru = 'pesanan/pesananBaru';
const deliveryOrder = 'deliveryOrder';
const pengaturanUmum = 'setting/setting';
const bahanBaku = 'bahanBaku';
const pembelianBahanBaku = 'pembelianBahanBaku';
const mitra = 'mitra';
const pengeluaran = 'pengeluaran';
const arusKas = 'arusKas/1';
const laporanTransaksi = 'laporanTransaksi';
const statistik = 'statistik';
const bantuan = 'bantuan';
const manajemenUser = 'manajemenUser';
const tentangAplikasi = 'tentangAplikasi';
const frontEndSetting = 'frontEndSetting';
var routeToFirebaseSetting = server + 'utility/getFirebaseSetting';
var routeToGetPesanan = server + 'deliveryOrder/getPesananTerbaru';
const d = new Date();
const tahun = d.getFullYear();
var halaman;
NProgress.configure({ showSpinner: false });

// VUE OBJECT 
var divNavbar = new Vue({
  el : '#divNavbar',
  data : {
    apiKey : '',
    authDomain : '',
    databaseURL : '',
    projectId : '',
    storageBucket : '',
    messagingSenderId : '',
    appId : '',
    pesanan : [],
    capFlash : ''
  },
  methods : {
    lihatNotifAtc : function()
    {
      $('#capNotif').removeClass('beep');
      this.capFlash = "(Memuat pesanan ...)";
      let pjgArray = 5;
      var i;
      for(i = 0; i < pjgArray; i++){
        this.pesanan.splice(0,1);
      }
      setTimeout(function(){
        $.post(routeToGetPesanan, function(data){
          let obj = JSON.parse(data);
          let pesanan = obj.pesanan;
          pesanan.forEach(renderPesanan);
          function renderPesanan(item, index){
            divNavbar.pesanan.push({
              title : 'Pesanan baru ('+pesanan[index].kd_pesanan+')',
              status : pesanan[index].status,
              masuk : pesanan[index].masuk
            });
          }
        });        
      }, 200);
      this.capFlash = "";
    },
    lihatNotifikasiAllAtc : function()
    {
      divMenu.deliveryOrderAtc();
    }
  }
});

var divFooter = new Vue({
  el: '#divFooter',
  data: {
    author: "NadhaMedia",
    tahun: tahun
  }
});

var divJudul = new Vue({
  el :'#capUtama',
  data : {
    judulForm : 'Beranda'
  }
});


var divMenu = new Vue({
  el: '#divMenu',
  data: {
    
  },
  methods: {
    berandaAct : function()
    {
      renderMenu(beranda); 
      divJudul.judulForm = "Beranda";
    },
    monitoringAtc : function()
    {
      renderMenu(monitoring);
      divJudul.judulForm = "Monitoring Restoran";
    },
    menuAtc : function()
    {
      renderMenu(menu);
      divJudul.judulForm = "Menu Restoran";
    },
    pelangganAtc : function()
    {
      renderMenu(pelanggan);
      divJudul.judulForm = "Daftar Pelanggan";
    },
    mejaAtc : function()
    {
      renderMenu(meja);
      divJudul.judulForm = "List Meja";
    },
    promoAtc : function()
    {
      renderMenu(promo);
      divJudul.judulForm = "Promo";
    },
    pesananBaruAtc : function()
    {
      renderMenu(pesananBaru);
      divJudul.judulForm = "Pesanan baru";
    },
    pesananAtc : function()
    {
     renderMenu(pesanan);
     divJudul.judulForm = "Daftar Pesanan"; 
    },
    deliveryOrderAtc : function()
    {
      renderMenu(deliveryOrder);
      divJudul.judulForm = "Delivery Order"; 
    },
    pengaturanUmumAtc : function()
    {
      renderMenu(pengaturanUmum);
      divJudul.judulForm = "Pengaturan Resto";
    },
    bahanBakuAtc : function()
    {
      renderMenu(bahanBaku);
      divJudul.judulForm = "Bahan Baku";
    },
    mitraAtc : function()
    {
      renderMenu(mitra);
      divJudul.judulForm = "Daftar Mitra";
    },
    pembelianBahanBakuAtc : function()
    {
      renderMenu(pembelianBahanBaku);
      divJudul.judulForm = "Pembelian bahan baku";
    },
    pengeluaranAtc : function()
    {
      renderMenu(pengeluaran);
      divJudul.judulForm = "Pengeluaran Resto";
    },
    arusKasAtc : function()
    {
      renderMenu(arusKas);
      divJudul.judulForm = "Arus Kas";
    },
    laporanTransaksiAtc : function()
    {
      renderMenu(laporanTransaksi);
      divJudul.judulForm = "Laporan Transaksi";
    },
    statistikAtc : function()
    {
      renderMenu(statistik);
      divJudul.judulForm = "Statistik Resto";
    },
    bantuanAtc : function()
    {
      renderMenu(bantuan);
      divJudul.judulForm = "Bantuan";
    },
    manajemenUserAtc : function()
    {
      renderMenu(manajemenUser);
      divJudul.judulForm = "Manajemen User";
    },
    backupRestoreDataAtc : function()
    {
      pesanUmumApp('info', 'Contact Haxors', 'Fitur ini membutuhkan service firebase, silahkan kontak haxorsprogramming untuk mengaktifkan fungsi ini');
    },
    tentangAplikasiAtc : function()
    {
      renderMenu(tentangAplikasi);
      divJudul.judulForm = "Tentang Aplikasi";
    },
    sliderUtamaSettingAtc : function()
    {
      renderMenu(frontEndSetting+'/sliderUtama');
      divJudul.judulForm = "Setting Slider Utama";
    },
    specialOfferAtc : function()
    {
      renderMenu(frontEndSetting+'/specialOffer');
      divJudul.judulForm = "Special Offers";
    }
  }
});

// INISIALISASI 
renderMenu(beranda);

$.post(routeToFirebaseSetting, function(data){
  let obj = JSON.parse(data);
  divNavbar.apiKey = obj.apiKey;
  divNavbar.authDomain = obj.authDomain;
  divNavbar.databaseURL = obj.databaseURL;
  divNavbar.projectId = obj.projectId;
  divNavbar.storageBucket = obj.storageBucket;
  divNavbar.messagingSenderId = obj.messagingSenderId;
  divNavbar.appId = obj.appId;
});

$.post(routeToGetPesanan, function(data){
  let obj = JSON.parse(data);
  let pesanan = obj.pesanan;
  pesanan.forEach(renderPesanan);
  function renderPesanan(item, index){
    divNavbar.pesanan.push({
      title : 'Pesanan baru ('+pesanan[index].kd_pesanan+')',
      status : pesanan[index].status,
      masuk : pesanan[index].masuk
    });
  }
});

setTimeout(function(){
  var firebaseConfig = {
    apiKey: divNavbar.apiKey,
    authDomain: divNavbar.authDomain,
    databaseURL: divNavbar.databaseURL,
    projectId: divNavbar.projectId,
    storageBucket: divNavbar.storageBucket,
    messagingSenderId: divNavbar.messagingSenderId,
    appId: divNavbar.appId
  };
  
  firebase.initializeApp(firebaseConfig);
  var db = firebase.database();
  var pesanan = db.ref('pesanan'); 

  pesanan.on('child_added', function(renderData){
    pesanUmumApp('info', 'Pesanan baru', 'Ada pesanan baru masuk .. cek sekarang .. ');  
    $('#capNotif').addClass('beep');
  });

}, 100);

// FUNCTION
function renderMenu(halaman) {
  progStart();
  $('#divUtama').html("Memuat form ..");
  $('#divUtama').load(server+halaman);
  progStop();
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}

function progStart()
{
  NProgress.start();
}

function progStop()
{
  NProgress.done();
}