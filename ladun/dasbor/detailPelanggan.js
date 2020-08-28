// ROUTE 
var routeToUpdatePelanggan = server + 'pelanggan/updatePelanggan';
var routeToDeletePelanggan = server + 'pelanggan/hapusPelanggan';

// VUE OBJECT 
var detailPelanggan = new Vue({
    el : '#divDetailPelanggan',
    data : {
        btnCap : 'Edit',
        btnClass  : 'far fa-edit',
    },
    methods : {
        editAtc : function()
        {
            if(this.btnCap === 'Edit'){
                $(".form-control").removeAttr("disabled");
                $("#txtNama").focus();
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
                $("#txtNomorHp").attr("disabled", "disabled");
            }else{
                prosesUpdate();    
            }
        },
        hapusPelangganAtc : function(kdPelanggan)
        {
            hapusPelanggan(kdPelanggan);
        },
        kembaliAtc : function()
        {
            divMenu.pelangganAtc();
        }
    }
});

// FUNCTION 
function prosesUpdate()
{
    let nama = document.querySelector('#txtNama').value;
    let alamat = document.querySelector('#txtAlamat').value;
    let nomorHp = document.querySelector('#txtNomorHp').value;
    let email = document.querySelector('#txtEmail').value;
    let kdPelanggan = document.querySelector('#txtKdPelanggan').value;

    if(nama === '' || alamat === '' || nomorHp === '' || email === ''){
        pesanUmumApp('warning', 'Isi field!!', 'Isi field yg kosong ...!!!');
    }else{
        $.post(routeToUpdatePelanggan, {'kdPelanggan' : kdPelanggan,'nama':nama, 'alamat':alamat, 'nomorHp':nomorHp, 'email':email}, function(data){
            let obj = JSON.parse(data);
            if(obj.status === 'sukses'){
                pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate data pelanggan..');
                detailPelanggan.btnCap = 'Edit';
                detailPelanggan.btnClass = 'far fa-edit';
                $(".form-control").attr("disabled", "disabled");
            }else{

            }       
        });
    }
}

function hapusPelanggan(kdPelanggan)
{
    Swal.fire({
        title: "Hapus pelanggan?",
        text: "Yakin menghapus pelanggan ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
            $.post(routeToDeletePelanggan, {'kdPelanggan':kdPelanggan}, function(data){
                let obj = JSON.parse(data);
                if(obj.status === 'sukses'){
                    pesanUmumApp('success', 'Sukses', 'Berhasil menghapus pelanggan!!');
                    divMenu.pelangganAtc();
                }
            });
        }
      });
}