//alamat server, ganti sesuai dengan konfigurasi alamat server anda
const server = 'http://localhost/Nadha-Resto/';
//login url 
const loginUrl = server+'login/prosesLogin';
//inisialisasi variabel lokal
const awalLogin = true;

$(document).ready(function(){
  document.getElementById("txtUsername").focus();
});

var loginForm = new Vue({
  el: "#login-app",
  data: {
    userInput: '',
    passwordInput: ''
  },
  methods: {
    klikSaya: function() {
      let xhr = new XMLHttpRequest();
        let params = "username="+this.userInput+"&password="+this.passwordInput;
        xhr.open('POST', loginUrl, true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function(){
            let obj = JSON.parse(this.responseText);
            if (obj.status_login === 'sukses') {
              suksesLogin();
            } else {
              gagalLogin(); 
            }
        }
        xhr.send(params);
    }
  }
});

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
