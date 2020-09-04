// ROUTE 
var routeToSimpanPesanan = server + 'pesanan/buatPesanan';
var routeToUpdateTempPesanan = server + 'pesanan/updateTempPesanan';
var routeToGetMenuKategori = server + 'pesanan/getMenuKategori';

// VUE OBJECT
var divPilihPesanan = new Vue({
    el : '#divPilihPesanan',
    data : {
        cap : 'Pilih tipe pesanan'
    }
});

var divPesananDineIn = new Vue({
    el : '#divPesananDineIn',
    data : {
        mejaDipilihCap : '',
        mejaDipilihId : '',
        namaPelanggan : '',
        kdPelanggan : '',
        jlhTamu : ''
    },
    methods : {
        mejaDipilihAtc : function(nama, id)
        {
           this.mejaDipilihCap = nama;
           this.mejaDipilihId = id;
        },
        pilihMenuAtc : function()
        {
            this.jlhTamu = document.querySelector('#txtJlhTamu').value;
            divMenuCheckout.jlhTamu = this.jlhTamu;
            if(this.mejaDipilihId === ''){
                pesanUmumApp('warning', 'Pilih meja', 'Harap pilih meja!!');
            }else{
                if(this.kdPelanggan === '' || this.kdPelanggan === 'none'){
                    pesanUmumApp('warning', 'Pilih pelanggan', 'Harap pilih pelanggan!!');
                }else{
                    if(this.jlhTamu > 0){
                        divMenuCheckout.mejaId = this.mejaDipilihId;
                        divMenuCheckout.mejaCap = this.mejaDipilihCap;
                        divPilihPesanan.cap = 'Pilih menu & checkout';
                        divMenuCheckout.pelanggan = this.namaPelanggan;
                        divMenuCheckout.kdPelanggan = this.kdPelanggan;
                        $('#divMenuCheckout').show();
                        $('#divPesananDineIn').hide();
                    }else{
                        pesanUmumApp('warning', 'Jumlah tamu', 'Harap masukkan jumlah tamu ..');
                    }
                }
            }
        }
    }
});

var arrTh = [];
var divPesananTakeHome = new Vue({
    el : '#divPesananTakeHome',
    data : {
        namaPelanggan : '',
        kdPelanggan : '',
        kategoriMenu : '',
        menuDipilih : [],
        daftarItem : [],
        totalHarga : 0
    },
    methods : {
        getMenuThAtc : function()
        {
            $.post(routeToGetMenuKategori, {'kdMenu':this.kategoriMenu}, function(data){
                let obj = JSON.parse(data);
                let menu = obj.menu;
                let pic = 'ladun/dasbor/img/menu/';
                let jlhMenu = divPesananTakeHome.menuDipilih.length;
                var i;
                for(i = 0; i < jlhMenu; i++){
                    divPesananTakeHome.menuDipilih.splice(0,1);
                }
                menu.forEach(renderMenu);
                function renderMenu(item, index)
                {
                    divPesananTakeHome.menuDipilih.push({
                       nama : menu[index].nama, pic : menu[index].pic, deks : menu[index].deks, kdMenu : menu[index].kd_menu, harga : menu[index].harga
                    });
                }
            });
        },
        tambahItem : function(kdMenu, nama, harga)
        {
            let cekArray = arrTh.includes(kdMenu);
            if(cekArray === true){
                let posArr = arrTh.indexOf(kdMenu);
                //update quantity
                let qt = this.daftarItem[posArr].qt;
                let qtN = parseInt(qt) + 1;
                this.daftarItem[posArr].qt = qtN;
                //update total harga per item
                let tHargaItem = this.daftarItem[posArr].total;
                let uHargaItem = parseInt(tHargaItem) + parseInt(harga);
                this.daftarItem[posArr].total = uHargaItem;
                //update total harga 
                let hUpdate = parseInt(this.totalHarga) + parseInt(harga);
                this.totalHarga = hUpdate;
            }else{
                arrTh.push(kdMenu);
                this.daftarItem.push({kdMenu : kdMenu, namaMenu : nama, harga : harga, qt : 1, total : harga});
                //update total harga 
                let hargaUpdate = parseInt(this.totalHarga) + parseInt(harga);
                this.totalHarga = hargaUpdate;
            }
        },
        hapusItem : function(kdMenu)
        {
            let cekArray = arrTh.includes(kdMenu);
            if(cekArray === true){
                let posArr = arrTh.indexOf(kdMenu);
                //cari total harga item 
                let tHItem = this.daftarItem[posArr].total;
                let hUpdateDelete = parseInt(this.totalHarga) - parseInt(tHItem);
                this.totalHarga = hUpdateDelete;
                arrTh.splice(posArr, 1);
                this.daftarItem.splice(posArr, 1);   
            }else{
                pesanUmumApp('warning', 'No menu', 'Menu tidak ada');
            }
        },
        prosesPesanan : function()
        {
            let jlhPesanan = this.daftarItem.length;
            if(this.namaPelanggan === '')
            {
                pesanUmumApp('warning', 'Pilih pelanggan', 'Pilih pelanggan ..');
            }else{
                if(jlhPesanan < 1){
                    pesanUmumApp('warning', 'Pilih menu', 'Pilih menu ..');
                }else{
                    let dataSend = {'kdPelanggan' : this.kdPelanggan}
                    let pesanan = this.daftarItem;
                    $.post('pesanan/buatPesananTakeHome', dataSend, function(data){
                        let obj = JSON.parse(data);
                        let kdPesanan = obj.kdPesanan;
                        pesanan.forEach(renderPesanan);
                        function renderPesanan(item, index)
                        {
                            let dsn = {
                                'kdMenu':pesanan[index].kdMenu, 
                                'kdPesanan':kdPesanan, 
                                'hargaAt':pesanan[index].harga, 
                                'qt':pesanan[index].qt,
                                'total':pesanan[index].total
                            }
                            $.post('pesanan/updateTempPesanan', dsn, function(data){
                               
                            });
                        }
                        renderMenu('pembayaran/formPembayaran/'+kdPesanan);
                    });
                }
            }
        }
    }
});

function setNamaPelangganTh()
{
    let bahanPelanggan = document.getElementById('txtPelangganTh').value;
    let bp = bahanPelanggan.split("-");
    divPesananTakeHome.kdPelanggan = bp[0];
    divPesananTakeHome.namaPelanggan = bp[1];
}

//vue objek menu checkout 
var arrMenu = [];
var divMenuCheckout = new Vue({
    el : '#divMenuCheckout',
    data : {
        kategoriMenu : '',
        dataMenu : [],
        menuDipilih : [],
        pelanggan : '',
        kdPelanggan : '',
        jlhTamu : '',
        mejaId : '',
        mejaCap : '',
        totalHarga : 0
    },
    methods : {
        getMenuAtc : function()
        {
            $.post('pesanan/getMenuKategori', {'kdMenu':this.kategoriMenu}, function(data){
                let obj = JSON.parse(data);
                let menu = obj.menu;
                let pic = 'ladun/dasbor/img/menu/';
                let jlhMenu = divMenuCheckout.dataMenu.length;
                var i;
                for(i = 0; i < jlhMenu; i++){
                    divMenuCheckout.dataMenu.splice(0,1);
                }
                menu.forEach(renderMenu);
                function renderMenu(item, index)
                {
                    divMenuCheckout.dataMenu.push({
                       nama : menu[index].nama, pic : menu[index].pic, deks : menu[index].deks, kdMenu : menu[index].kd_menu, harga : menu[index].harga
                    });
                }
            });
        },
        tambahItem : function(kdMenu, nama, harga)
        {
            // console.log(nama);
            let cekSlug = arrMenu.includes(kdMenu);
            let letakIndex = arrMenu.indexOf(kdMenu);
            let tHargaAwal = this.totalHarga;
            this.totalHarga = parseInt(tHargaAwal) + parseInt(harga);
            // console.log(letakIndex);
            if(cekSlug === true){
                let qtLama = divMenuCheckout.menuDipilih[letakIndex].qt;
                let qtBaru = qtLama + 1;
                let hargaLama = divMenuCheckout.menuDipilih[letakIndex].total;
                let hargaBaru = parseInt(hargaLama) + parseInt(harga);
                divMenuCheckout.menuDipilih[letakIndex].total = hargaBaru;
                divMenuCheckout.menuDipilih[letakIndex].qt = qtBaru;
                // console.log(divMenuCheckout.menuDipilih[letakIndex].qt);
            }else{
                arrMenu.push(kdMenu);
                divMenuCheckout.menuDipilih.push({
                    menu : kdMenu, namaMenu:nama, qt : 1, harga : harga, total : harga
                });
            }
            // console.log(divMenuCheckout.menuDipilih); 
        },
        hapusItem : function(kdMenu)
        {
            let cekArray = arrMenu.includes(kdMenu);
            if(cekArray === true){
                let li = arrMenu.indexOf(kdMenu);
                let qtUp = divMenuCheckout.menuDipilih[li].qt;
                let hargaItem = divMenuCheckout.menuDipilih[li].harga;
                let tPerItem = parseInt(qtUp) * parseInt(hargaItem);
                let tHargaUp = divMenuCheckout.menuDipilih[li].total;
                divMenuCheckout.menuDipilih[li].total = 0;
                let hAwal = this.totalHarga;
                this.totalHarga = parseInt(hAwal) - parseInt(tPerItem);
                arrMenu.splice(li, 1);
                divMenuCheckout.menuDipilih.splice(li, 1);
            }else{
                
            }
        },
        bayarAtc : function()
        {
            if(divMenuCheckout.totalHarga < 1){
                pesanUmumApp('warning', 'Pilih item', 'Belum ada item dipilih..');
            }else{
                $.post(routeToSimpanPesanan, {'pelanggan':divMenuCheckout.kdPelanggan, 'tipe':'dine_in', 'jlhTamu':divMenuCheckout.jlhTamu, 'mejaId':divMenuCheckout.mejaId}, function(data){
                    let obj = JSON.parse(data);
                    console.log(obj);
                    if(obj.status === 'sukses'){
                        let kdPesanan = obj.kdPesanan;
                        //save to data temp pesanan
                        let dtm = divMenuCheckout.menuDipilih;
                        dtm.forEach(sendTempPesanan);
                        function sendTempPesanan(item, index){
                            let dataSend = {'kdMenu':dtm[index].menu, 'kdPesanan':kdPesanan, 'hargaAt':dtm[index].harga, 'qt':dtm[index].qt, 'total':dtm[index].total}
                            $.post(routeToUpdateTempPesanan, dataSend, function(data){
                               console.log("Send");
                            });
                        }
                        renderMenu('pembayaran/formPembayaran/'+kdPesanan);
                    }else{ 
                        
                    }
                });
            }
        }
    }
});

// INISIALISASI 
$('#divPesananDineIn').hide();
$('#divPesananTakeHome').hide();
$('#divMenuCheckout').hide();
$(".select2").select2();

document.getElementById('btnDineIn').addEventListener('click', function(){
    divPilihPesanan.cap = 'Pilih meja & pelanggan';
    $('#divPesananDineIn').show();
    $('#btnPilihPesanan').hide();
    $('#divGambarPenggoda').hide();
});

document.getElementById('btnTakeHome').addEventListener('click', function(){
    divPilihPesanan.cap = 'Detail Pesanan';
    $('#divPesananTakeHome').show();
    $('#btnPilihPesanan').hide();
    $('#divGambarPenggoda').hide();
});

function setMenuKategori()
{
    divMenuCheckout.kategoriMenu = document.querySelector('#txtKategori').value;
    divMenuCheckout.getMenuAtc();
}

function setMenuTakeHome()
{
    divPesananTakeHome.kategoriMenu = document.querySelector('#txtKategoriTh').value;
    divPesananTakeHome.getMenuThAtc();
}

function setPelanggan()
{
   let bahanPelanggan = document.querySelector('#txtPelanggan').value;
   let bp = bahanPelanggan.split("-");
   divPesananDineIn.kdPelanggan = bp[0];
   divPesananDineIn.namaPelanggan = bp[1];
}
