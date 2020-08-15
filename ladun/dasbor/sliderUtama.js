//route
var routeToSaveSlider = '';

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

    },
    methods : {
        kembaliAtc : function()
        {

        }
    }
});


$('#tblSlider').dataTable();
$('#divTambahSlider').hide();