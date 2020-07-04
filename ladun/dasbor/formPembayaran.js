var divFormPembayaran = new Vue({
    el : '#divFormPembayaran',
    data : {
        kdPesanan : '',
        kdInvoice : '',
        itemPesanan : [],
        kdPromo : '',
        namaPelanggan : '',
        totalHarga : '',
        tax : '',
        tipePesanan : '',
        jumlahTamu : '',
        noMeja : '',
        waktuMasuk : '',
        hargaAkhir : '',
        tunai : '',
        kembali : '',
        hargaAfterTax : '',
        taxPrice : '',
        valuePromo : ''
    },
    methods : {
        cekPromoAtc : function()
        {
            cekPromo();
        },
        setFinalHarga : function()
        {
            if(parseInt(this.tunai) < parseInt(this.hargaAkhir)){
                pesanUmumApp('error', 'Jumlah tunai', 'Jumlah uang tunai harus lebih besar/sama dengan total haraga!!');
            }else{
                document.getElementById('btnProsesPembayaran').classList.remove('disabled');
                this.kembali = parseInt(this.tunai) - parseInt(this.hargaAkhir);
            }
        },
        prosesPembayaranAtc : function()
        {
            konfirmasiPembayaran();
        },
        kembaliAtc : function()
        {
            renderMenu(pesanan);
            divJudul.judulForm = "Daftar Pesanan"; 
        }
    }
});

var kdPesananGlobal = document.getElementById('txtKdPesananHidden').value;
divFormPembayaran.kdPesanan = kdPesananGlobal;

//inisialisasi
document.getElementById('txtTunai').focus();
document.getElementById('btnProsesPembayaran').classList.add('disabled');

$.post('pembayaran/getDataPesanan', {'kdPesanan':kdPesananGlobal} ,function(data){
    let obj = JSON.parse(data);
    // console.log(obj);
    let itemPesanan = obj.tempPesanan;
    divFormPembayaran.kdInvoice = obj.kdInvoice;
    divFormPembayaran.namaPelanggan = obj.namaPelanggan;
    divFormPembayaran.totalHarga = obj.totalHarga;
    divFormPembayaran.hargaAkhir = obj.totalHarga;
    let tipePesanan = obj.tipePesanan;
    let detailPesanan = obj.detailPesanan;
    divFormPembayaran.jumlahTamu = detailPesanan.jumlah_tamu;
    divFormPembayaran.noMeja = obj.namaMeja;
    divFormPembayaran.waktuMasuk = detailPesanan.waktu_masuk;
    let tax = obj.tax;
    divFormPembayaran.tax = tax;
    let taxPrice = parseInt(tax) * parseInt(obj.totalHarga) / 100;
    divFormPembayaran.taxPrice = taxPrice;
    let hargaAfterTax = parseInt(obj.totalHarga) + taxPrice;
    divFormPembayaran.hargaAkhir = hargaAfterTax;
    if(tipePesanan == 'dine_in'){
        divFormPembayaran.tipePesanan = 'Makan di tempat (Dine in)';
    }else{
        divFormPembayaran.tipePesanan = 'Bawa pulang (take away)';
    }
    
    itemPesanan.forEach(renderPesanan);
    
    function renderPesanan(item, index){
        divFormPembayaran.itemPesanan.push({
            namaMenu : itemPesanan[index].namaMenu, 
            hargaAt : itemPesanan[index].hargaAt,
            qt : itemPesanan[index].qt,
            total : itemPesanan[index].total             
        });
    }

});

//cek promo 
function cekPromo()
{
    let kdPromo = divFormPembayaran.kdPromo;
    $.post('pembayaran/cekPromo', {'kdPromo':kdPromo}, function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'error_promo_code'){
            pesanUmumApp('error', 'Error kode promo', 'Kode promo tidak valid/berlaku');
        }else{
           let tipe = obj.tipe;
           let valuePromo = obj.value; 
           $('#txtGunakan').addClass('disabled');
           if(tipe === 'persen'){
                let persenValuePrice = parseInt(valuePromo) * parseInt(divFormPembayaran.hargaAkhir) / 100;
                divFormPembayaran.valuePromo = persenValuePrice;
                let hff = parseInt(divFormPembayaran.hargaAkhir) - parseInt(persenValuePrice);
                divFormPembayaran.hargaAkhir = hff;
           }else{
               let hargaFixBefore = divFormPembayaran.hargaAkhir;
               let hargaBeforePromo = parseInt(hargaFixBefore) - parseInt(valuePromo);
               divFormPembayaran.valuePromo = valuePromo;
               divFormPembayaran.hargaAkhir = hargaBeforePromo;
           }
        }
    });
}

function konfirmasiPembayaran()
{
    Swal.fire({
        title: "Konfirmasi?",
        text: "Proses pembayaran?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
      }).then((result) => {
        if (result.value) {
            prosesPembayaran();
        }
      });
}

function prosesPembayaran()
{
    let kdPesanan = divFormPembayaran.kdPesanan;
    let kdInvoice = divFormPembayaran.kdInvoice;
    let totalHarga = divFormPembayaran.totalHarga;
    let kdPromo = divFormPembayaran.kdPromo;
    let diskon = divFormPembayaran.valuePromo;
    let tax = divFormPembayaran.taxPrice;
    let totalFinal = divFormPembayaran.hargaAkhir;
    let tunai = divFormPembayaran.tunai;
    let kembali = divFormPembayaran.kembali;
    let meja = divFormPembayaran.noMeja;
    let dataSend = {'kdPesanan':kdPesanan,'kdInvoice':kdInvoice,'totalHarga':totalHarga,'kdPromo':kdPromo,'diskon':diskon,'tax':tax,'totalFinal':totalFinal,'tunai':tunai,'kembali':kembali,'meja':meja}
    $.post('pembayaran/prosesPembayaran', dataSend, function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'sukses'){
            pesanUmumApp('success', 'Sukses', 'Pembayaran berhasil ..');
            renderMenu(pesanan);
            divJudul.judulForm = "Daftar Pesanan"; 
        }
    });
}