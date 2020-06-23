//inisialisasi variabel lokal
const beranda = 'dasbor/beranda';
const menu = 'menu';
const pelanggan = 'pelanggan';
const d = new Date();
const tahun = d.getFullYear();
var halaman;

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
    }
  }
});
 
function renderMenu(halaman) {
  $('#divUtama').html("Memuat ...");
  $('#divUtama').load(halaman);
}
