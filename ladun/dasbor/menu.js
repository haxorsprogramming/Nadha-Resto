var divMenuResto = new Vue({
    el : '#divMenuResto',
    data : {

    },
    methods : {
        tambahMenuAtc : function()
        {
            renderMenu('menu/tambahMenu');
            divJudul.judulForm = "Tambah Menu Restoran"; 
        }
    }
});

$('#tblMenu').DataTable();

// Notification.requestPermission(permission => {
//     if(permission === 'granted'){
//         const myNotif = new Notification('Selamat ulang tahun', {
//             body : 'Ini notifikasi'
//         });
//     }
// });
