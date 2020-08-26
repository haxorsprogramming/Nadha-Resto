//ROUTE
var routeToTambahSlider = server+'/frontEndSetting/prosesTambahSlider';
var routeToDeleteSlider = server+'/frontEndSetting/prosesHapusSlider';

// VUE OBJECT 
var divDataSlider = new Vue({
    el : '#divDataSlider',
    data : {

    },
    methods: {
        tambahSliderAtc : function()
        {
            $('#divTambahSlider').show();
            $('#divDataSlider').hide();
            divJudul.judulForm = "Tambah Slider Baru";
            document.querySelector('#txtJudul').focus();
        },
        hapusAtc : function(idSlider){
            hapusSlider(idSlider);
        }
    }
});

var divTambahSlider = new Vue({
    el : '#divTambahSlider',
    data : {
        subHeader : '-',
        judul : '-',
        subJudul : '-',
        capButton : '-',
        link : '-'
    },
    methods : {
        kembaliAtc : function()
        {
            divMenu.sliderUtamaSettingAtc();
        },
        simpanAtc : function()
        {
            let foto = document.querySelector('#txtFoto').value;
            if( divTambahSlider.subHeader === '' || divTambahSlider.judul === '' || divTambahSlider.subJudul === '' || divTambahSlider.capButton === '' || divTambahSlider.link === '' || foto === ''){
                pesanUmumApp('warning', 'Isi Field!!!', 'Harap isi semua field!!');
            }else{
                if( divTambahSlider.subHeader.length < 5 || divTambahSlider.judul.length < 5 || divTambahSlider.subJudul.length < 5 || divTambahSlider.capButton.length < 5 || divTambahSlider.link.length < 5){
                    pesanUmumApp('warning', 'Karakter !!!', 'Minimal karakter untuk tiap field adalah 5');
                }else{
                    $("#frmUpload").submit();
                }
            }
        }
    }
});

// INISIALISASI
$('#tblSlider').dataTable();
$('#divTambahSlider').hide();

// FUNCTION 
$("#frmUpload").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: routeToTambahSlider,
        data: new FormData(this),
        dataType: "json",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
            blurButton();
        },
        success: function(data){
            if(data.status === 'error_tipe_file'){
                pesanUmumApp('error', 'Error tipe file', 'Tipe file yang diperbolehkan JPG, PNG');
                activeButton();
            }else if(data.status === 'error_size_file'){
                pesanUmumApp('error', 'Error size file', 'Ukuran foto yang diperbolehkan maksimal 2Mb');
                activeButton();
            }else{
                sukses();
            }
        }
    });
});

function hapusSlider(idSlider)
{
    Swal.fire({
        title: "Hapus Slider?",
        text: "Yakin menghapus Slider ? ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if(result.value){
          $.post(routeToDeleteSlider, {'id':idSlider}, function(data){
              let obj = JSON.parse(data);
              if(obj.status === 'sukses'){
                pesanUmumApp('success', 'Sukses', 'Berhasil menghapus slider...');
                divMenu.sliderUtamaSettingAtc();
              }else{
                pesanUmumApp('error', 'Gagal', 'Gagal menghapus slider...');
              }
          });
        }
      });
}

function setFoto()
{
    var pic = document.querySelector('#txtFoto');
    var imgPrev = document.querySelector('#txtImg');
    var fileGambar = new FileReader();
    fileGambar.readAsDataURL(pic.files[0]);

    fileGambar.onload = function(e){
        let hasil = e.target.result;
        imgPrev.src = hasil;
    }
}

function blurButton()
{
    $('#btnSimpan').addClass('disabled');
}

function activeButton()
{
    $('#btnSimpan').removeClass('disabled');
}

function sukses()
{
    pesanUmumApp('success', 'Sukses', 'Berhasil menambahkan slider baru');
    divMenu.sliderUtamaSettingAtc();
}
