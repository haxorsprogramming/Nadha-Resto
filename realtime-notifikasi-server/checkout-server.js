var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);

app.get('/', function(req, res){
    res.send('<h1>Nadharesto realtime server</h1>');
});

io.on('connection', function(socket){

    console.log('Seorang pelanggan membuka website..');
  
    socket.on('status', function(status){
      io.emit('status', status);
      console.log("Ada pesanan masuk..");
    });

    socket.on('disconnect', function() {
      console.log("User disconnect");
    });
  
});

http.listen(2501, function(){
    console.log('Server di port 2501');
});