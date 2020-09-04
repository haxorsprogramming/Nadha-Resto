// VUE OBJECT 
var divCekPesanan = new Vue({
    el : '#divCekPesanan',
    data : {
        kdPesanan : '1290'
    },
    methods : {
        cekPesananAtc : function()
        {
            let kdPesanan = document.querySelector('#txtKdPesanan').value;
            console.log(kdPesanan);
        }
    }
});

// INISIALISASI 
document.querySelector('#txtKdPesanan').focus();