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
        apiWaResponder : '',
        saldoAwal : '',
        nomorHandphone : '',
        koneksiPrinter : '',
        emailHost : '',
        emailHostPassword : '',
        logo : ''       

    },
    methods : {
        updateAtc : function()
        {
            if(this.btnCap === 'Edit'){
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
                $(".form-control").removeAttr("disabled");
            }else{
                this.btnCap = 'Edit';
                this.btnClass = 'far fa-edit';
                $(".form-control").attr("disabled", "disabled");
            }
        }
    }
});

//inisialisasi
$.post('setting/getDataRestoran', function(data){
    let obj = JSON.parse(data);
    divSetting.namaResto = obj.namaResto;
    divSetting.alamatResto = obj.alamatResto;
    divSetting.namaOwner = obj.namaOwner;
    divSetting.tax = obj.tax;
    divSetting.ipAddressPrintKasir = obj.ipAddressPrintKasir,
    divSetting.ipAddressPrintKichen = obj.ipAddressPrintKichen,
    divSetting.ipAddressPrintOther = obj.ipAddressPrintOther,
    divSetting.emailResto = obj.emailResto,
    divSetting.awalPembukuan = obj.awalPembukuan,
    divSetting.apiWaResponder = obj.apiWaResponder,
    divSetting.saldoAwal = obj.saldoAwal,
    divSetting.nomorHandphone = obj.nomorHandphone,
    divSetting.koneksiPrinter = obj.koneksiPrinter,
    divSetting.emailHost = obj.emailHost,
    divSetting.emailHostPassword = obj.emailHostPassword,
    divSetting.logo = obj.logo
});