var divPesanan = new Vue({
    el : '#divPesanan',
    data : {
        pageNow : 1,
        pageMax : 0,
        halaman : [{no : 1}],
        dataPesanan : []
    },
    methods : {
        prevAtc : function()
        {
            let pagePrev = this.pageNow - 1;
            $('#liNext').show();
            this.halaman[0].no = pagePrev;
            getPesanan(pagePrev);
            this.pageNow = parseInt(this.pageNow) - 1;
            if(this.pageNow <= 1){
                $('#liPrev').hide();
            }
        },
        nextAtc : function()
        {
            let pageNext = this.pageNow + 1; 
            this.halaman[0].no = pageNext;
            getPesanan(pageNext);
            this.pageNow = parseInt(this.pageNow) + 1;
            if(this.pageNow >= 2){
                $('#liPrev').show();
            }
            if(this.pageNow === this.pageMax){
                $('#liNext').hide();
                $('#liPrev').show();
            }
        },
        bayarPesanan : function(kdPesanan)
        {
            bayarPesanan(kdPesanan);
        },
        detailPesanan : function(kdPesanan)
        {
            detailPesanan(kdPesanan);
        },
        updatePesanan : function(kdPesanan)
        {
            updatePesanan(kdPesanan);
        },
        batalkanPesanan : function(kdPesanan)
        {
            konfirmBatalkanPesan(kdPesanan);
        },
        toNomorHalamanAtc : function()
        {
            let nomorHal = document.getElementById('txtNomorHalaman').value;
            if(nomorHal < 1 || nomorHal > this.pageMax){
                pesanUmumApp('warning', 'Periksa field!!', 'Masukkan nomor yang benar');
            }else{
                getPesanan(nomorHal);
                this.pageNow = parseInt(nomorHal);
                this.halaman[0].no = nomorHal;
            }
        },
        cariPesananAtc : function()
        {
            cariPesanan();
        }
    }
});

// INISIALISASI 
$('#liPrev').hide();

var pt;
for(pt = 0; pt < 10; pt++){
    divPesanan.dataPesanan.push({pesanan : '', tipe : '', meja : '', tamu : '', waktu : '', pembayaran : '', pelanggan : '', status : '', operator : '', kdPesananCap : ''});
}

$.post('pesanan/getMaxPagePesanan', function(data){
    let obj = JSON.parse(data);
    divPesanan.pageMax = obj.jlhPaginasi;
});

var startPage = 1;
setTimeout(function(){getPesanan(startPage);}, 300);

function getPesanan(page){
    var j;
    for(j = 0; j < parseInt(divPesanan.dataPesanan.length); j++){
        divPesanan.dataPesanan[j].pesanan = '';
        divPesanan.dataPesanan[j].tipe = '';
        divPesanan.dataPesanan[j].meja = '';
        divPesanan.dataPesanan[j].tamu = '';
        divPesanan.dataPesanan[j].waktu = '';
        divPesanan.dataPesanan[j].pembayaran = '';
        divPesanan.dataPesanan[j].pelanggan = '';
        divPesanan.dataPesanan[j].status = '';
        divPesanan.dataPesanan[j].operator = '';
        divPesanan.dataPesanan[j].kdPesananCap = '';
    }
    setTimeout(function(){
        $.post('pesanan/getPesanan/'+page, function(data){
            let obj = JSON.parse(data);
            let status = obj.status;

            if(status === 'success'){
                let pesanan = obj.pesanan;
                let pjg = obj.pesanan.length;
                let pjgArr = divPesanan.dataPesanan.length;
                //clear tabel sebelumnya 
                var h;
                for(h = 0; h < parseInt(pjgArr); h++){
                    divPesanan.dataPesanan.splice(0, 1);
                }
                //push skeleton screen 
                var ut;
                for(ut = 0; ut < parseInt(pjg); ut++){
                    divPesanan.dataPesanan.push({pesanan : '', tipe : '', meja : '', tamu : '', waktu : '', pembayaran : '', pelanggan : '', status : '', operator : '', kdPesananCap : ''});
                }
                //push data
                var i;
                for(i = 0; i < parseInt(pjg); i++){
                    let kdPesanan = pesanan[i].kdPesanan;
                    let pesananCap = kdPesanan.toUpperCase();
                    let tipe = pesanan[i].tipe;
                    if(tipe === 'dine_in'){
                        divPesanan.dataPesanan[i].tipe = "Makan di tempat (Dine in)";
                        divPesanan.dataPesanan[i].meja = pesanan[i].meja;
                    }else{
                        divPesanan.dataPesanan[i].tipe = "Bawa pulang (Take away)";
                        divPesanan.dataPesanan[i].meja = "-";
                    }
                    divPesanan.dataPesanan[i].pesanan = pesanan[i].kdPesanan;
                    divPesanan.dataPesanan[i].pelanggan = pesanan[i].namaPelanggan;
                    
                    divPesanan.dataPesanan[i].waktu = pesanan[i].waktuMasuk;
                    divPesanan.dataPesanan[i].pembayaran = pesanan[i].namaPelanggan;
                    divPesanan.dataPesanan[i].tamu = pesanan[i].jumlahTamu;
                    divPesanan.dataPesanan[i].status = pesanan[i].status;
                    divPesanan.dataPesanan[i].operator = pesanan[i].operator;
                    divPesanan.dataPesanan[i].kdPesananCap = pesananCap+"<br/>"+pesanan[i].namaPelanggan;
                }  
            }else{
                var k;
                for(k = 0; k < 10; k++){
                    divPesanan.dataPesanan.splice(0, 1);
                }
            }
        });
    }, 200);
}

function cariPesanan()
{
    let kdPesanan = document.getElementById('txtPesananCari').value;
    let pjg = kdPesanan.length;
    if(pjg < 4){
        pesanUmumApp('warning', 'Error', 'Minimal kd pencarian adalah 4');
    }else{
        $.post('pesanan/cariPesanan', {'char':kdPesanan}, function(data){
            let obj = JSON.parse(data);
            if(obj.status === 'error'){
                pesanUmumApp('warning', 'No record!!', 'Tidak ada pesanan sesuai kode yang dimasukkan!!');
            }else{
                let pesanan = obj.pesanan;
                //clear pesanan di vue 
                let pjg = divPesanan.dataPesanan.length;
                var o;
                for(o = 0; o < pjg; o++){
                    divPesanan.dataPesanan.splice(0,1);
                }
                pesanan.forEach(renderPesanan);
                function renderPesanan(item, index){
                    let kdPesanan = pesanan[index].kdPesanan;
                    let pesananCap = kdPesanan.toUpperCase();
                    let tipe = pesanan[index].tipe;
                    let tipeCap = '';
                    let mejaCap = '';
                    if(tipe === 'dine_in'){
                        tipeCap = "Makan di tempat (Dine in)";
                        mejaCap = pesanan[index].meja;
                    }else{
                        tipeCap = "Bawa pulang (Take away)";
                        mejaCap = "-";
                    }
                    divPesanan.dataPesanan.push({
                        pesanan : pesanan[index].kdPesanan,
                        pelanggan : pesanan[index].namaPelanggan,
                        waktu : pesanan[index].waktuMasuk,
                        pembayaran : pesanan[index].kdPesanan,
                        tamu : pesanan[index].jumlahTamu,
                        status : pesanan[index].status,
                        operator : pesanan[index].operator,
                        tipe : tipeCap,
                        meja : mejaCap,
                        kdPesananCap : pesananCap+"<br/>"+pesanan[index].namaPelanggan
                    });
            }
        }
        });
    }
}

function konfirmBatalkanPesan(kdPesanan)
{
    Swal.fire({
        title: "Batalkan pesanan?",
        text: "Yakin membatalkan pesanan?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
            batalkanPesanan(kdPesanan);
        }
      });
}

function batalkanPesanan(kdPesanan)
{
    let dataSend = {'kdPesanan':kdPesanan}
    $.post('pesanan/batalkanPesanan', dataSend, function(data){
        let obj = JSON.parse(data);
        if(obj.status === 'sukses'){
            pesanUmumApp('success', 'Sukses', 'Berhasil membatalkan pesanan');
            renderMenu(pesanan);
            divJudul.judulForm = "Daftar Pesanan"; 
        }
    });
}

function detailPesanan(kdPesanan)
{
    renderMenu('pesanan/detailPesanan/'+kdPesanan);
    divJudul.judulForm = "Detail Pesanan";
}

function bayarPesanan(kdPesanan)
{
    renderMenu('pembayaran/formPembayaran/'+kdPesanan);
    divJudul.judulForm = "Pembayaran";
}

function updatePesanan(kdPesanan)
{
    renderMenu('pesanan/updatePesanan/'+kdPesanan);
    divJudul.judulForm = "Update Pesanan";
}