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
            }else{
                this.btnCap = 'Edit';
                this.btnClass = 'far fa-edit';
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