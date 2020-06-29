//inisialisasi variabel lokal
const beranda = 'dasbor/beranda';
const menu = 'menu';
const pelanggan = 'pelanggan';
const meja = 'meja';
const promo = 'promo';
const d = new Date();
const tahun = d.getFullYear();
var halaman;
NProgress.configure({ showSpinner: false });

// fungsi pertama kali dijalankan
renderMenu(beranda);

//objek vue footer
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

//objek vue menu
var divMenu = new Vue({
  el: '#divMenu',
  data: {},
  methods: {
    berandaAct : function() {
      renderMenu(beranda); 
      divJudul.judulForm = "Beranda";
    },
    menuAtc : function() {
      renderMenu(menu);
      divJudul.judulForm = "Menu Restoran";
    },
    pelangganAtc : function() {
      renderMenu(pelanggan);
      divJudul.judulForm = "Daftar Pelanggan";
    },
    mejaAtc : function() {
      renderMenu(meja);
      divJudul.judulForm = "List Meja";
    },
    promoAtc : function() {
      renderMenu(promo);
      divJudul.judulForm = "Promo";
    }
  }
});
 
function renderMenu(halaman) {
  NProgress.start();
  $('#divUtama').html("");
  $('#divUtama').load(halaman);
  NProgress.done();
}
