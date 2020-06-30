//inisialisasi variabel lokal
const beranda = 'dasbor/beranda';
const menu = 'menu';
const pelanggan = 'pelanggan';
const meja = 'meja';
const promo = 'promo';
const pesanan = 'pesanan';
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
    },
    pesananAtc : function() {
      Swal.fire({
        title: 'Pilih tipe pesanan',
        text: "Silahkan pilih tipe pesanan..",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0984e3',
        cancelButtonColor: '#00cec9',
        confirmButtonText: 'Makan ditempat (dine in)',
        cancelButtonText : 'Bawa pulang (take home)'
      }).then((result) => {
        if (result.value) {
          renderMenu(pesanan);
          divJudul.judulForm = 'Pesanan baru dine in (makan di tempat)'
        }else{
          window.alert("ke route take home");
        }
      })
    }
  }
});
 
function renderMenu(halaman) {
  NProgress.start();
  $('#divUtama').html("");
  $('#divUtama').load(halaman);
  NProgress.done();
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}