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
        }
    }
});


//inisialisasi 
$('#divPesananDineIn').hide();
$(".select2").select2();

document.getElementById('btnDineIn').addEventListener('click', function(){
    divPilihPesanan.cap = 'Pilih meja & pelanggan';
    $('#divPesananDineIn').show();
    $('#btnPilihPesanan').hide();
});


function setPelanggan()
{
   let kdPelanggan = document.getElementById('txtPelanggan').value;
   divPesananDineIn.kdPelanggan = kdPelanggan;
}

