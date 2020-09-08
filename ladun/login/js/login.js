// ROUTE 
const routeToLogin = server + 'login/prosesLogin/';

// VUE OBJECT 
var loginForm = new Vue({
  el: "#login-app",
  data: {
    userInput: '',
    passwordInput: ''
  },
  methods: {
    klikSaya: function() {
      $('#btnMasuk').addClass('disabled');
      $.post(routeToLogin, {username : 'admin', password : 'admin'}, function(data){
        let obj = JSON.parse(data);
        if(obj.status_login === 'sukses'){
          suksesLogin();
        }else{
          gagalLogin();
          $('#btnMasuk').removeClass('disabled'); 
        }
      });
    }
  }
});

// FUNCTION 
function suksesLogin() {
  iziToast.info({
    title: "Sukses",
    message: "Berhasil login, ke halaman dasbor",
    position: "topCenter",
    timeout: 1000,
    pauseOnHover: false,
    onClosed: function() {
      window.location.assign('dasbor');
    }
  });
}

function gagalLogin() {
  iziToast.error({
    title: "Gagal",
    message: "Username / Password salah!!",
    position: "topCenter",
    timeout: 1000,
    pauseOnHover: false,
    onClosed: function() {
      clearForm();
    }
  });
}

function isiField() {
  iziToast.warning({
    title: "Isi Field!!",
    message: "Masukkan username & Password",
    position: "topCenter",
    timeout: 2000,
    pauseOnHover: false,
    onClosed: function() {
      clearForm();
    }
  });
}

function clearForm() {
  document.getElementById("txtUsername").value = "";
  document.getElementById("txtPassword").value = "";
  document.getElementById("txtUsername").focus();
}
