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
            if(this.mejaDipilihId === ''){
                pesanUmumApp('warning', 'Pilih meja', 'Harap pilih meja!!');
            }else{
                if(this.kdPelanggan === '' || this.kdPelanggan === 'none'){
                    pesanUmumApp('warning', 'Pilih pelanggan', 'Harap pilih pelanggan!!');
                }else{
                    if(this.jlhTamu > 0){
                        window.alert("Next broo");
                    }else{
                        pesanUmumApp('warning', 'Jumlah tamu', 'Harap masukkan jumlah tamu ..');
                    }
                }
            }
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

