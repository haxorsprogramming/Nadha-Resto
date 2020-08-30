// ROUTE  
var routeToTambahMeja = server + "meja/prosesTambahMeja";
var routeToDeleteMeja = server + "meja/hapusMeja";

// VUE OBJECT 
var divMeja = new Vue({
    el : '#divMeja',
    data : {
        namaMeja : '',
        deks : ''
    },
    methods : {
       tambahMejaAtc : function()
       {
        divJudul.judulForm = "Tambah Meja";
        $('#divTambahMeja').show();
        $('#divDataMeja').hide();
        document.querySelector('#txtNamaMeja').focus();
       },
       kembaliAtc : function()
       {
        divMenu.mejaAtc();
       },
       prosesSimpan : function()
       {
           this.namaMeja = document.querySelector('#txtNamaMeja').value;
           this.deks = document.querySelector('#txtDeks').value;
           if(this.namaMeja === '' || this.deks === ''){
            pesanUmumApp('error', 'Isi field!!', 'Harap isi semua field!!');
           }else{
               prosesSimpan();
           }
       },
       hapusAtc : function(kdMeja, namaMeja)
       {
        hapusMeja(kdMeja, namaMeja);
       } 
    }
});

// INISIALISASI 
$('#tblMeja').dataTable();
$('#divTambahMeja').hide();

document.getElementById('btnSimpan').addEventListener('click', function(){
    divMeja.prosesSimpan();
});

// FUNCTION 
function prosesSimpan()
{
    let namaMeja = divMeja.namaMeja;
    let deks = divMeja.deks;
    let dataSend = {'namaMeja':namaMeja, 'deks':deks}
    $.post(routeToTambahMeja, dataSend,  function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'meja_name_error'){
            pesanUmumApp('error', 'Error !!', 'Nama meja sudah digunakan!!');
        }else{
            pesanUmumApp('success', 'sukses', 'Berhasil menambahkan meja');
            divMeja.kembaliAtc();
        }
    });
}

function hapusMeja(kdMeja, namaMeja)
{
    Swal.fire({
        title: "Hapus meja?",
        text: "Yakin menghapus meja "+namaMeja+"?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
           $.post(routeToDeleteMeja, {'kdMeja':kdMeja}, function(data){
               let obj = JSON.parse(data);
               if(obj.status === 'sukses'){
                   pesanUmumApp('success', 'Sukses', 'Berhasil menghapus meja..');
                   divMenu.mejaAtc();
               }else{

               }
           });
        }
      });
}