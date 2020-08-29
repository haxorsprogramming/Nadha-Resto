// VUE OBJECT 
var divDetailBahanBaku = new Vue({
    el : '#divDetailBahanBaku',
    data : {
        btnCap : 'Edit',
        btnClass  : 'far fa-edit',
    },
    methods : {
        editAtc : function()
        {
            if(divDetailBahanBaku.btnCap === 'Edit'){
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
                $(".form-control").removeAttr("disabled");
            }else{
                
            }
        }        
    }
});