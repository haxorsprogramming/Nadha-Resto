<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
Nama : <input type="text" id='txtNama'> | Email : <input type="text" id='txtEmail'> | Bacotan : <input type="text"  id='txtBacotan'> <br/><br/>
<button onclick="tesSimpan()">Simpan</button>

<hr/>
<div id='divBacotan'>
<h4>Bacotan</h4>
<p>
  <ul>
    <li v-for='b in bacotan'>Nama : {{b.nama}} - Bacotan : {{b.bacotan}} | <a href='#!' @click='hapus(b.key)'>Hapus</a></li>
  </ul>
</p>
</div>
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.17.0/firebase-database.js"></script>
<script>
  // Your web app's Firebase configuration
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
  var bacotanCol = db.ref('bacotanKita'); 
  //vue object 
  var divBacotan = new Vue({
    el : '#divBacotan',
    data : {
      bacotan : []
    },
    methods : {
      hapus: function(key)
      {
        hapusRecord(key);
      }
    }
  });

  bacotanCol.on('value', function(renderData){
    let jlhData = divBacotan.bacotan.length;
    var i;
    for(i = 0; i < jlhData; i++){
      divBacotan.bacotan.splice(0,1);
    }
    renderData.forEach(function(dataBacotan){
      var uniqueId = dataBacotan.key;
      var dataB = dataBacotan.val();
      divBacotan.bacotan.push({
        nama : dataB['nama'],
        bacotan : dataB['bacot'],
        key : uniqueId
      });
    });
  });

  function hapusRecord(key){
    db.ref('bacotanKita/'+key).remove();
  }

  function tesSimpan()
  {
    let uid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
    let nama = document.getElementById('txtNama').value;
    let email = document.getElementById('txtEmail').value;
    let bacotan = document.getElementById('txtBacotan').value;
    db.ref('bacotanKita/'+uid).set({
      email : email,
      nama : nama,
      bacot : bacotan
    });
  }

  function sukses(items)
  {
   
  }

  function gagal()
  {

  }
</script>
  </body>
</html>