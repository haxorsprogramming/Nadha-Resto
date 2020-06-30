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
            this.jlhTamu = document.getElementById('txtJlhTamu').value;
            divMenuCheckout.jlhTamu = this.jlhTamu;
            // divMenuCheckout.meja = this.mejaDipilihCap
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
//vue objek menu checkout 
var arrMenu = [];
var divMenuCheckout = new Vue({
    el : '#divMenuCheckout',
    data : {
        kategoriMenu : '',
        dataMenu : [],
        menuDipilih : [],
        pelanggan : '',
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
                console.log(divMenuCheckout.menuDipilih[letakIndex].qt);
            }else{
                arrMenu.push(kdMenu);
                divMenuCheckout.menuDipilih.push({
                    menu : kdMenu, namaMenu:nama, qt : 1, harga : harga, total : harga
                });
            }
            console.log(divMenuCheckout.menuDipilih); 
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
            console.log(arrMenu);
        }
    }
});

//inisialisasi 
$('#divPesananDineIn').hide();
$('#divMenuCheckout').hide();
$(".select2").select2();

document.getElementById('btnDineIn').addEventListener('click', function(){
    divPilihPesanan.cap = 'Pilih meja & pelanggan';
    $('#divPesananDineIn').show();
    $('#btnPilihPesanan').hide();
});


function setMenuKategori()
{
    divMenuCheckout.kategoriMenu = document.getElementById('txtKategori').value;
    divMenuCheckout.getMenuAtc();
}

function setPelanggan()
{
   let bahanPelanggan = document.getElementById('txtPelanggan').value;
   let bp = bahanPelanggan.split("-");
   divPesananDineIn.kdPelanggan = bp[0];
   divPesananDineIn.namaPelanggan = bp[1];
//    console.log(bp);
}
