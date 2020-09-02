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
    console.log(kdPromo+namaPromo+deks+tipe+nilai+kuota+tanggalExpired);
}