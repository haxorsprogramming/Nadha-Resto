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
        logo : 'def.jpg'       

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
                    'namaResto' : this.namaResto, 'alamatResto' : this.alamatResto, 'namaOwner' : this.namaResto,
                    'tax' : this.tax, 'ipAddressPrintKasir' : this.ipAddressPrintKasir, 'ipAddressPrintKichen' : this.ipAddressPrintKichen,
                    'ipAddressPrintOther' : this.ipAddressPrintOther, 'emailResto' : this.emailResto, 'awalPembukuan' : this.awalPembukuan, 'apiWaResponder': this.apiWaResponder,
                    'saldoAwal' : this.saldoAwal, 'nomorHandphone' : this.nomorHandphone, 'koneksiPrinter' : this.koneksiPrinter, 'emailHost' : this.emailHost, 
                    'emailHostPassword' : this.emailHostPassword
                }
                if(this.namaResto === '' || this.alamatResto === '' || this.namaResto === '' || this.tax === '' || this.ipAddressPrintKasir === '' || this.ipAddressPrintKichen === '' || this.ipAddressPrintOther === '' || this.emailResto === '' || this.awalPembukuan === '' || this.apiWaResponder === '' || this.saldoAwal === '' || this.nomorHandphone === '' || this.koneksiPrinter === '' || this.emailHost === '' || this.emailHostPassword === ''){
                    pesanUmumApp('warning', 'Isi field!!', 'Harap lengkapi field!!');
                }else{

                }
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