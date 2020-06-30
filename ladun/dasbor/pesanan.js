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
            if(this.mejaDipilihId === ''){
                pesanUmumApp('warning', 'Pilih meja', 'Harap pilih meja!!');
            }else{
                if(this.kdPelanggan === '' || this.kdPelanggan === 'none'){
                    pesanUmumApp('warning', 'Pilih pelanggan', 'Harap pilih pelanggan!!');
                }else{
                    if(this.jlhTamu > 0){
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
        jlhTamu : ''
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
                       nama : menu[index].nama, pic : menu[index].pic, deks : menu[index].deks, kdMenu : menu[index].kd_menu 
                    });
                }

            });
        },
        tambahItem : function(kdMenu, nama)
        {
            console.log(nama);
            let cekSlug = arrMenu.includes(kdMenu);
            let letakIndex = arrMenu.indexOf(kdMenu);
            // console.log(letakIndex);
            if(cekSlug === true){
                let totalLama = divMenuCheckout.menuDipilih[letakIndex].total;
                let totalbaru = totalLama + 1;
                divMenuCheckout.menuDipilih[letakIndex].total = totalbaru;
                console.log(divMenuCheckout.menuDipilih[letakIndex].total);
            }else{
                arrMenu.push(kdMenu);
                divMenuCheckout.menuDipilih.push({
                    menu : kdMenu, namaMenu:nama ,total : 1
                });
            } 
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
   console.log(bp);
}
