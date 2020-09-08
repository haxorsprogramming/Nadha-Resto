// ROUTE 
var routeToGetPesanan = server + 'setting/getDataRestoran';
var routeToUpdateSetting = server + 'setting/updateData';

// VUE OBJECT 
var divSetting = new Vue({
    el : '#divSetting',
    data : {
        btnCap : 'Edit',
        btnClass  : 'far fa-edit',
        namaResto : '',
        alamatResto : '',
        namaOwner : '',
        tax : '',
        ipAddressPrintKasir : '',
        ipAddressPrintKichen : '',
        ipAddressPrintOther : '',
        emailResto : '',
        awalPembukuan : '',
        apiWooWa : '',
        saldoAwal : '',
        nomorHandphone : '',
        koneksiPrinter : '',
        emailHost : '',
        emailHostPassword : '',
        logo : 'def.jpg',       
        f_apiKey : '',
        f_authDomain : '',
        f_databaseURL : '',
        f_projectId : '',
        f_storageBucket : '',
        f_messagingSenderId : '',
        f_appId : ''
    },
    methods : {
        updateAtc : function()
        {
            if(this.btnCap === 'Edit'){
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
                $(".form-control").removeAttr("disabled");
            }else{
                let dataSend = {
                    'namaResto' : this.namaResto,
                    'alamatResto' : this.alamatResto, 
                    'namaOwner' : this.namaOwner,
                    'tax' : this.tax,
                    'ipAddressPrintKasir' : this.ipAddressPrintKasir,
                    'ipAddressPrintKichen' : this.ipAddressPrintKichen,
                    'ipAddressPrintOther' : this.ipAddressPrintOther,
                    'emailResto' : this.emailResto,
                    'awalPembukuan' : this.awalPembukuan,
                    'apiWooWa': this.apiWooWa,
                    'saldoAwal' : this.saldoAwal,
                    'nomorHandphone' : this.nomorHandphone,
                    'koneksiPrinter' : this.koneksiPrinter,
                    'emailHost' : this.emailHost,
                    'emailHostPassword' : this.emailHostPassword
                }
                if(this.namaResto == '' || this.alamatResto == '' || this.namaResto == '' || this.tax == '' || this.ipAddressPrintKasir == '' || this.ipAddressPrintKichen == '' || this.ipAddressPrintOther == '' || this.emailResto == '' || this.awalPembukuan == '' || this.apiWooWa == '' || this.saldoAwal == '' || this.nomorHandphone == '' || this.koneksiPrinter == '' || this.emailHost == '' || this.emailHostPassword == ''){
                    pesanUmumApp('warning', 'Isi field!!', 'Harap lengkapi field!!');
                }else{
                    NProgress.start();
                    $.post(routeToUpdateSetting, dataSend, function(data){
                        NProgress.done();
                    });
                }
                this.btnCap = 'Edit';
                this.btnClass = 'far fa-edit';
                $(".form-control").attr("disabled", "disabled");
            }
        }
    }
});

//INISIALISASI
$.post(routeToGetPesanan, function(data){
    let obj = JSON.parse(data);
    divSetting.namaResto = obj.namaResto;
    divSetting.alamatResto = obj.alamatResto;
    divSetting.namaOwner = obj.namaOwner;
    divSetting.tax = obj.tax;
    divSetting.ipAddressPrintKasir = obj.ipAddressPrintKasir;
    divSetting.ipAddressPrintKichen = obj.ipAddressPrintKichen;
    divSetting.ipAddressPrintOther = obj.ipAddressPrintOther;
    divSetting.emailResto = obj.emailResto;
    divSetting.awalPembukuan = obj.awalPembukuan;
    divSetting.apiWooWa = obj.apiWooWa;
    divSetting.saldoAwal = obj.saldoAwal;
    divSetting.nomorHandphone = obj.nomorHandphone;
    divSetting.koneksiPrinter = obj.koneksiPrinter;
    divSetting.emailHost = obj.emailHost;
    divSetting.emailHostPassword = obj.emailHostPassword;
    divSetting.logo = obj.logo;
    divSetting.f_apiKey = obj.f_apiKey;
    divSetting.f_authDomain = obj.f_authDomain;
    divSetting.f_databaseURL = obj.f_databaseURL;
    divSetting.f_projectId = obj.f_projectId;
    divSetting.f_storageBucket = obj.f_storageBucket;
    divSetting.f_messagingSenderId = obj.f_messagingSenderId;
    divSetting.f_appId = obj.f_appId;
});