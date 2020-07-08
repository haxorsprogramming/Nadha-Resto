var divUpdatePesanan = new Vue({
    el : '#divUpdatePesanan',
    data : {
        dataMenu : [],
        dataKategori : [],
        kategoriDipilih : ''
    }
});

//inisialisasi 

//get data kategori
$.post('utility/getDataKategori', function(data){
    let obj = JSON.parse(data);
    let listKategori = obj.kategori;
    listKategori.forEach(renderKategori);
    function renderKategori(item, index){
        divUpdatePesanan.dataKategori.push({
            kd : listKategori[index].id,
            nama : listKategori[index].nama
        });
    }
});

function setMenuKategori()
{
    let kategori = document.getElementById('txtKategori').value;
}
