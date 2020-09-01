// ROUTE 
var routeToUpdate = server + 'mitra/updateMitra';
var routeToHapus = server + 'mitra/deleteMitra';

// VUE OBJECT 
var divDetailMitra = new Vue({
    el : '#divDetailMitra',
    data : {
        btnCap : 'Edit',
        btnClass  : 'far fa-edit',
    },
    methods : {
        editAtc : function()
        {
            if(this.btnCap === 'Edit'){
                $(".form-control").removeAttr("disabled");
                $('#txtNamaMitra').focus();
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
            }else{
                prosesUpdate();
            }
        },
        kembaliAtc : function()
        {
            divMenu.mitraAtc();
        },
        hapusMitraAtc : function(kdMitra)
        {
            hapusMitra(kdMitra);
        }
    }
});

// FUNCTION 
function prosesUpdate()
{
    let nama = document.querySelector('#txtNamaMitra').value;
    let deks = document.querySelector('#txtDeks').value;
    let alamat = document.querySelector('#txtAlamat').value;
    let pemilik = document.querySelector('#txtPemilik').value;
    let noHp = document.querySelector('#txtNoHp').value;
    let kdMitra = document.querySelector('#txtKdMitra').value;
    
    if(nama === '' || deks === '' || alamat === '' || pemilik === '' || noHp === ''){
        pesanUmumApp('warning', 'Isi field!!', 'Isi field dengan benar ..');
    }else{
        let dataSend = {'kdMitra':kdMitra, 'nama':nama, 'deks':deks, 'alamat':alamat, 'pemilik':pemilik, 'noHp':noHp}
        $.post(routeToUpdate, dataSend, function(data){
            let obj = JSON.parse(data);
            if(obj.status === 'sukses'){
                pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate mitra ...');
                divDetailMitra.btnCap = 'Edit';
                divDetailMitra.btnClass = 'far fa-edit';
                $(".form-control").attr("disabled", "disabled");
            }else{

            }
        });
    }
}

function hapusMitra(kdMitra)
{
    Swal.fire({
        title: "Hapus mitra?",
        text: "Yakin menghapus mitra ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
            $.post(routeToHapus, {'kdMitra':kdMitra}, function(data){
                let obj = JSON.parse(data);
                if(obj.status === 'sukses'){
                    pesanUmumApp('success', 'Sukses', 'Berhasil menghapus mitra ...');
                    divMenu.mitraAtc();
                }else{

                }
            });
        }
      });
   
}