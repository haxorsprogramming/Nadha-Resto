// ROUTE 
var routeToUpdate = server + 'bahanBaku/updateBahanBaku';
var routeToDelete = server + 'bahanBaku/hapusBahanBaku';

// VUE OBJECT 
var divDetailBahanBaku = new Vue({
    el : '#divDetailBahanBaku',
    data : {
        btnCap : 'Edit',
        btnClass  : 'far fa-edit',
    },
    methods : {
        editAtc : function()
        {
            if(divDetailBahanBaku.btnCap === 'Edit'){
                this.btnCap = 'Simpan';
                this.btnClass = 'fas fa-save';
                $(".form-control").removeAttr("disabled");
            }else{
                let kdBahan = document.querySelector('#txtKdBahan').value;
                let nama = document.querySelector('#txtNama').value;
                let deks = document.querySelector('#txtDeks').value;
                let kategori = document.querySelector('#txtKategori').value;
                let satuan = document.querySelector('#txtSatuan').value;
                let stok = document.querySelector('#txtStok').value;
                if(nama === '' || deks === '' || kategori === '' || satuan === '' || stok === '' || stok < 0){
                    pesanUmumApp('warning', 'Isi field!!', 'Harap lengkap field!!');
                }else{
                    let dataSend = {'nama':nama, 'deks':deks, 'kategori':kategori, 'satuan':satuan, 'stok':stok, 'kdBahan':kdBahan}
                    $.post(routeToUpdate, dataSend, function(data){
                        let obj = JSON.parse(data);
                        if(obj.status==='sukses'){
                            pesanUmumApp('success', 'Sukses', 'Berhasil mengupdate bahan baku');
                            divDetailBahanBaku.btnCap = 'Edit';
                            divDetailBahanBaku.btnClass = 'far fa-edit';
                            $(".form-control").attr("disabled", "disabled");
                        }else{

                        }
                    });
                }
            }
        },
        kembaliAtc : function()
        {
            divMenu.bahanBakuAtc();
        },
        hapusBahanBaku : function(kdBahan)
        {
            hapusBahanBaku(kdBahan);
        }
    }
});

// FUNCTION 
function hapusBahanBaku(kdBahan)
{
    Swal.fire({
        title: "Hapus bahan baku?",
        text: "Yakin menghapus bahan baku ... ?",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya",
        cancelButtonText: "Tidak",
      }).then((result) => {
        if (result.value) {
           $.post(routeToDelete, {'kdBahan':kdBahan}, function(data){
               let obj = JSON.parse(data);
               if(obj.status === 'sukses'){
                   pesanUmumApp('success', 'Sukses', 'Berhasil menghapus bahan baku..');
                   divMenu.bahanBakuAtc();
               }else{

               }
           });
        }
      });
}