//route
var routeToTambahSlider = server+'frontEndSetting/prosesTambahSlider';

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

        }
    }
});

//inisialisasi
$('#tblSlider').dataTable();
$('#divTambahSlider').hide();

function setFoto()
{
    var pic = document.querySelector('#txtFoto');
    var imgPrev = document.querySelector('#txtImg');
    var fileGambar = new FileReader();
    fileGambar.readAsDataURL(pic.files[0]);

    fileGambar.onload = function(e){
        let hasil = e.target.result;
        console.log(hasil);
        imgPrev.src = hasil;
    }
}