var divDetailMenu = new Vue({
    el : '#divDetailMenu',
    data : {
        btnCap : 'Edit',
        btnClass  : 'far fa-edit',
    },
    methods : {
        editAtc : function()
        {
            if(divDetailMenu.btnCap === 'Edit'){
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
                $(".form-control").removeAttr("disabled");
                $("#divUploadFoto").show();
            }else{
                this.btnCap = 'Edit';
                this.btnClass = 'far fa-edit';
                $(".form-control").attr("disabled", "disabled");
                $("#divUploadFoto").hide();
            }
            
        }
    }
});

$("#divUploadFoto").hide();
var rupiah = document.getElementById('txtHarga');

function imgPrev()
{
    var foto = document.querySelector('#txtFotoSrc');
    var imgPrev = document.querySelector('#txtFoto');
    var fileGambar = new FileReader();
    fileGambar.readAsDataURL(foto.files[0]);

    fileGambar.onload = function(e){
        let hasil = e.target.result;
        imgPrev.src = hasil;
    }
}

rupiah.addEventListener('keyup', function(e){
    rupiah.value = formatRupiah(this.value);
});


function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split   		= number_string.split(','),
    sisa     		= split[0].length % 3,
    rupiah     		= split[0].substr(0, sisa),
    ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}