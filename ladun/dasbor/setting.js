var divSetting = new Vue({
    el : '#divSetting',
    data : {
        btnCap : 'Edit',
        btnClass  : 'far fa-edit',
        namaResto : '',
        alamatResto : ''
    },
    methods : {
        updateAtc : function()
        {
            if(this.btnCap === 'Edit'){
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
                $(".form-control").removeAttr("disabled");
            }else{
                this.btnCap = 'Edit';
                this.btnClass = 'far fa-edit';
                $(".form-control").attr("disabled", "disabled");
            }
        }
    }
});

//inisialisasi
$.post('setting/getDataRestoran', function(data){
    let obj = JSON.parse(data);
    divSetting.namaResto = obj.namaResto;
    divSetting.alamatResto = obj.alamatResto;
});