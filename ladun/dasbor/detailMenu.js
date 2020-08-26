// ROUTE
var routeToHapusMenu = server+'menu/hapusMenu';
var routeToUpdateMenu = server+'menu/updateMenu';

// VUE OBJECT 
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
                let namaMenu = document.querySelector('#txtNamaMenu').value;
                let deksMenu = document.querySelector('#txtDeksMenu').value;
                let kategori = document.querySelector('#txtKategori').value;
                let satuan = document.querySelector('#txtSatuan').value;
                let harga = document.querySelector('#txtHarga').value;
                
                if(namaMenu === '' || deksMenu === '' || kategori === '' || satuan === '' || harga === '')
                {
                    pesanUmumApp('warning', 'Isi field!!', 'Harap isi semua field!!');
                }else{
                    $("#frmEditMenu").submit();
                    
                }
            }
        },
        hapusMenuAtc : function(kdMenu)
        {
            konfirmasiHapus(kdMenu);
        },
        kembaliAtc : function()
        {
            divMenu.menuAtc();
        }
    }
});

//INISIALISASI
$("#divUploadFoto").hide();
var rupiah = document.getElementById('txtHarga');

// FUNCTION 
$("#frmEditMenu").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: routeToUpdateMenu,
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            $(".form-control").attr("disabled", "disabled");
        },
        success: function(data){
            let status = data.status;
            // console.log(obj);
            if(status === 'error_tipe_file'){
                pesanUmumApp('warning', 'Error', 'Tipe file tidak diperbolehkan!!');
            }else if(status === 'error_size_file'){
                pesanUmumApp('warning', 'Error', 'Ukuran foto tidak boleh lebih dari 2Mb!!!');
            }else{
                pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate menu ..');
                divDetailMenu.btnCap = 'Edit';
                divDetailMenu.btnClass = 'far fa-edit';
                $(".form-control").attr("disabled", "disabled");
                $("#divUploadFoto").hide();
            }
        }
    });
});



function konfirmasiHapus(kdMenu)
{
    Swal.fire({
        title: "Hapus menu?",
        text: "Yakin menghapus ini ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
           $.post(routeToHapusMenu, {'kdMenu':kdMenu}, function(data){
                let obj = JSON.parse(data);
                if(obj.status === 'sukses'){
                    pesanUmumApp('success', 'Sukses', 'Berhasil menghapus menu..');
                    divMenu.menuAtc();
                }else{

                }
           });
        }
      });
}

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