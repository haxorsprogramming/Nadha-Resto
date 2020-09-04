// ROUTE 
var routeToUpdate = server + 'promo/update';
var routeToDelete = server + 'promo/delete';

// VUE OBJECT 
var divDetailPromo = new Vue({
    el : '#divDetailPromo',
    data : {
        btnCap : 'Edit',
        btnClass  : 'far fa-edit',
    },
    methods : {
        editAtc : function()
        {
            if(this.btnCap === 'Edit'){
                $(".form-control").removeAttr("disabled");
                $("#txtNamaPromo").focus();
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
            }else{
                prosesUpdate();    
            }
        },
        kembaliAtc : function()
        {
            divMenu.promoAtc();
        },
        hapusPromoAtc : function(kdPromo)
        {
            hapusPromo(kdPromo);
        }
    }
});

// FUNCTION 
function prosesUpdate()
{
    let kdPromo = document.querySelector('#txtKdPromo').value;
    let namaPromo = document.querySelector('#txtNamaPromo').value;
    let deks = document.querySelector('#txtDeks').value;
    let tipe = document.querySelector('#txtTipe').value;
    let nilai = document.querySelector('#txtNilai').value;
    let kuota = document.querySelector('#txtKuota').value;
    let tanggalExpired = document.querySelector('#txtTanggalExpired').value;

    if(namaPromo === '' || deks === '' || nilai === '' || kuota === '' || kuota <= 0)
    {
        pesanUmumApp('warning', 'Isi field!!', 'Isi field dengan benar ..!!');
    }else{
        let dataSend = {'kdPromo':kdPromo, 'namaPromo':namaPromo, 'deks':deks, 'tipe':tipe, 'nilai':nilai, 'kuota':kuota, 'tanggalExpired':tanggalExpired}
        progStart();
        $.post(routeToUpdate, dataSend,  function(data){
            let obj = JSON.parse(data);
            console.log(obj);
            if(obj.status === 'error_tanggal'){
                pesanUmumApp('error', 'Error', 'Pastikan tanggal expired yang diinput benar ... ');
            }else{
                pesanUmumApp('success', 'Sukses', 'Update promo berhasil..');
                divDetailPromo.btnCap = 'Edit';
                divDetailPromo.btnClass = 'far fa-edit';
                $(".form-control").attr("disabled", "disabled");
            }
            progStop();
        });
    }

}

function hapusPromo(kdPromo)
{
    Swal.fire({
        title: "Hapus promo?",
        text: "Yakin menghapus promo ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
            $.post(routeToDelete, {'kdPromo':kdPromo}, function(data){
                let obj = JSON.parse(data);
                if(obj.status === 'sukses'){
                    pesanUmumApp('success', 'Sukses', 'Berhasil menghapus promo ...');
                    divMenu.promoAtc();
                }else{
                   
                }
            });
        }
      });
}