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

const d = new Date();
const tahun = d.getFullYear();
var halaman;
NProgress.configure({ showSpinner: false });

// INISIALISASI 
renderMenu(beranda);

// VUE OBJECT 
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
 
// FUNCTION
document.querySelector('#capNotif').addEventListener('click', function(){
  $('#capNotif').removeClass('beep');
});

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