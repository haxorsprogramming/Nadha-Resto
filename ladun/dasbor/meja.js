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
        document.getElementById('txtNamaMeja').focus();
       },
       kembaliAtc : function()
       {
        renderMenu(meja);
        divJudul.judulForm = "List Meja";
       },
       prosesSimpan : function()
       {
           this.namaMeja = document.getElementById('txtNamaMeja').value;
           this.deks = document.getElementById('txtDeks').value;
           if(this.namaMeja === '' || this.deks === ''){
               pesanUmum('error', 'Isi field!!', 'Harap isi semua field!!');
           }else{
               prosesSimpan();
           }
       } 
    }
});

//inisialisasi
$('#tblMeja').dataTable();
$('#divTambahMeja').hide();

document.getElementById('btnSimpan').addEventListener('click', function(){
    divMeja.prosesSimpan();
});

function prosesSimpan()
{
    let namaMeja = divMeja.namaMeja;
    let deks = divMeja.deks;
    let dataSend = {'namaMeja':namaMeja, 'deks':deks}
    $.post('meja/prosesTambahMeja', dataSend,  function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'meja_name_error'){
            pesanUmum('error', 'Error !!', 'Nama meja sudah digunakan!!');
        }else{
            pesanUmum('success', 'sukses', 'Berhasil menambahkan meja');
            divMeja.kembaliAtc();
        }
    });
}

function pesanUmum(icon, title, text){
    Swal.fire({
        icon : icon,
        title : title,
        text : text
    });
}