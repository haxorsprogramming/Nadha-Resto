//route
var routeToTambahSlider = server+'/frontEndSetting/prosesTambahSlider';

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
        }
    }
});

var divTambahSlider = new Vue({
    el : '#divTambahSlider',
    data : {
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
            if(divTambahSlider.judul === '' || divTambahSlider.subJudul === '' || divTambahSlider.capButton === '' || divTambahSlider.link === '' || foto === ''){
                pesanUmumApp('warning', 'Isi Field!!!', 'Harap isi semua field!!');
            }else{
                //send request to server
                $("#frmUpload").submit();
            }
        }
    }
});

//inisialisasi
$('#tblSlider').dataTable();
$('#divTambahSlider').hide();

$("#frmUpload").on('submit', function(e){
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: routeToTambahSlider,
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function(){
           
        },
        success: function(data){
            console.log(data);
        }
    });
});

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