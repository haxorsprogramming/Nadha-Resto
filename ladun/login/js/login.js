// ROUTE 
const routeToLogin = server + 'login/prosesLogin/';

// VUE OBJECT 
var loginForm = new Vue({
  el: "#login-app",
  data: {

  },
  methods: {
    klikSaya: function(){
      let username = document.querySelector('#txtUsername').value;
      let password = document.querySelector('#txtPassword').value;

      if(username === '' || password === ''){
        isiField();
      }else{
        
        $('#btnMasuk').addClass('disabled');
        let dataSend = {username : username, password : password};
        $.post(routeToLogin, dataSend, function(data){
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
  document.querySelector("#txtUsername").value = "";
  document.querySelector("#txtPassword").value = "";
  document.querySelector("#txtUsername").focus();
}
