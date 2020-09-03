// ROUTE 
var routeGetKdTemp = server + "home/getKdtemp";
var saveTemp = server + "home/saveTemp";

// VUE OBJECT 
var divMenu = new Vue({
    el : '#divMenu',
    data : {
        totalHarga : 0
    },
    methods : {

    }
});

var kdMenuDipesan = [];

var cart = new Vue({
    el : '#divCartFinal',
    data : {
        nama : '',
        alamat : '',
        noHp : '',
        listItem : [],
        totalHarga : 0,
    },
    methods : {
        hapusItem : function(kdMenu)
        {
            pesanUmumApp('success', 'success', 'Item menu dihapus dari pesanan ... ');
            let cekPos = kdMenuDipesan.indexOf(kdMenu);
            //cari total harga item yang dipilih
            let tHargaItem = this.listItem[cekPos].harga;
            this.totalHarga = parseInt(this.totalHarga) - parseInt(tHargaItem);
            this.listItem.splice(cekPos, 1);
        },
        checkOutAtc : function()
        {
            let pjgItem = this.listItem.length;
            if(pjgItem > 0){
                //buat kode temp dulu 
                $.post(routeGetKdTemp, function(data){
                    let obj = JSON.parse(data);
                    let kdTemp = obj.kdTemp;
                    cart.listItem.forEach(renderItem);
                    function renderItem(item, index)
                    {
                        let kdMenu = cart.listItem[index].kdMenu;
                        let hargaAt = cart.listItem[index].hargaAt;
                        let qt = cart.listItem[index].qt;
                        let total = cart.listItem[index].harga;
                       
                        let dataSend = {'kdMenu':kdMenu, 'hargaAt':hargaAt, 'qt':qt, 'total':total, 'kdTemp':kdTemp}
                        $.post(saveTemp, dataSend, function(data){
                            window.location.assign('checkOut/'+kdTemp);
                        });
                    }
                });
            }else{
                pesanUmumApp('warning', 'No item', 'Tidak ada pesanan!!');
            }
        }
    }
});

// FUNCTION 
function checkOut()
{
    
    cart.checkOutAtc();
}

function addMenu(kdMenu, nama, harga)
{
    pesanUmumApp('success', 'Item ditambah', 'Berhasil menambahkan menu, silahkah lihat cart pesanan');
    divMenu.totalHarga = parseInt(divMenu.totalHarga) + parseInt(harga);
    let cekArray = kdMenuDipesan.includes(kdMenu);
    if(cekArray === true){
        let cekPos = kdMenuDipesan.indexOf(kdMenu);
        cart.listItem[cekPos].qt = parseInt(cart.listItem[cekPos].qt) + 1;
        cart.listItem[cekPos].harga = parseInt(cart.listItem[cekPos].harga) + parseInt(harga);
        cart.totalHarga = parseInt(cart.totalHarga) + parseInt(harga);
    }else{
        kdMenuDipesan.push(kdMenu);
        cart.listItem.push({nama : nama, harga : harga, qt : 1, hargaAt : harga, kdMenu:kdMenu});
        cart.totalHarga = parseInt(cart.totalHarga) + parseInt(harga);
    }
    let total = new Intl.NumberFormat().format(divMenu.totalHarga);
    document.getElementById('capJumlah').innerHTML = total;
}

function pesanUmumApp(icon, title, text)
{
  Swal.fire({
    icon : icon,
    title : title,
    text : text
  });
}