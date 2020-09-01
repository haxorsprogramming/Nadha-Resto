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
            $(".form-control").removeAttr("disabled");
            this.btnCap = 'Simpan';
            this.btnClass = 'fas fa-save';
        }
    }
});