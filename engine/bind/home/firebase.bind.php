<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<button onclick="tesSimpan()">Tes</button>

<hr/>
<div id='divBacotan'>
<h4>Bacotan</h4>
<p>
  <ul>
    <li v-for='b in bacotan'>Nama : {{b.nama}} - Bacotan : {{b.bacotan}}</li>
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
    }
  });
  
  bacotanCol.on('value', function(renderData){
    renderData.forEach(function(dataBacotan){
      var uniqueId = dataBacotan.key;
      var dataB = dataBacotan.val();
      divBacotan.bacotan.push({
        nama : dataB['nama'],
        bacotan : dataB['bacot']
      });
    });
  });

  function tesSimpan()
  {
    let uid = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
    db.ref('bacotanKita/'+uid).set({
      email : 'dindananinda@gmail.com',
      nama : 'Dinda yakali',
      bacot : 'Ah bisa ajaa'
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