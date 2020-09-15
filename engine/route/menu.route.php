<?php

class menu extends Route{

    private $sn = 'menuData';
    private $su = 'utilityData';
    
    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['menu'] = $this -> state($this -> sn) -> getMenu(); 
        $this -> bind('dasbor/menu/menu', $data);
    }

    public function tambahMenu()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['kategori'] = $this -> state($this -> sn) -> getKategori();
        $this -> bind('/dasbor/menu/formTambahMenu', $data);
    }

    public function prosesTambahMenu()
    {
        $this -> state($this -> su) -> csrfCek();
        //about img operation
        $sourcePath     = $this -> getTempFile('txtFoto');
        $tipeGambar     = array('png', 'jpg', 'jpeg');
        $namaFile       = $this -> getNameFile('txtFoto');
        $tipeFile       = $this -> getTypeFile($namaFile);
        $sizeFile       = $_FILES['txtFoto']['size'];
        //data operation
        $kdMenu         = $this -> rnint(8);
        $nama           = $this -> inp('txtNama');
        $deks           = $this -> inp('txtDeks');
        $harga          = $this -> inp('txtHarga');
        $satuan         = $this -> inp('txtSatuan');
        $kategori       = $this -> inp('txtKategori');
        $picName        = $kdMenu.".".$tipeFile;
        //remove (.) in text harga input
        $hargaClear         = str_replace(".", "", $harga);
        //set upload folder
        $destination    = 'ladun/dasbor/img/menu/'.$kdMenu.'.'.$tipeFile;
        //cek apakah nama makanan sudah ada
        $jlhNama        = $this -> state($this -> sn) -> cariNamaMakanan($nama);
        if($jlhNama > 0){
            $data['status'] = 'nama_menu_exist';
        }else{
            //cek tipe file
            if(in_array($tipeFile, $tipeGambar)){
                //cek ukuran file
                if($sizeFile < 2000){
                    $data['status'] = 'error_size_file'; 
                }else{
                    $data['status'] = 'success';
                    $this -> uploadFile($sourcePath, $destination);
                    $this -> state('menuData') -> prosesTambahMenu($kdMenu, $nama, $deks, $kategori, $satuan, $hargaClear, $picName);
                }
            }else{
                $data['status'] = 'error_tipe_file';
            }
        }
        $this -> toJson($data);
    }

    public function detailMenu($kdMenu)
    {
        $this -> state($this -> su) -> csrfCek();
        $data['satuan'] = array('porsi', 'paket', 'pcs');
        $data['kdMenu'] = $kdMenu;
        $data['historyPemesanan'] = $this -> state($this -> sn) -> getPembelianMenu($kdMenu);
        $data['dataMenu'] = $this -> state($this -> sn) -> getDetailMenu($kdMenu);
        $data['kategori'] = $this -> state($this -> su) -> getDataKategori();
        $this -> bind('dasbor/menu/detailMenu', $data);
    }

    public function hapusMenu()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdMenu = $this -> inp('kdMenu');
        $dataMenu = $this -> state($this -> sn) -> getDetailMenu($kdMenu);
        $pic = $dataMenu['pic'];
        $file = 'ladun/dasbor/img/menu/'.$pic;
        $this -> state($this -> sn) -> hapusMenu($kdMenu);
        unlink($file);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function updateMenu()
    {
        $this -> state($this -> su) -> csrfCek();
        $foto = $this -> getNameFile('txtFotoSrc');
        $sourcePath = $this -> getTempFile('txtFotoSrc');
        $kdMenu = $this -> inp('txtKdMenuHidden');
        $namaMenu = $this -> inp('txtNamaMenu');
        $deksMenu = $this -> inp('txtDeksMenu');
        $kategori = $this -> inp('txtKategori');
        $satuan = $this -> inp('txtSatuan');
        $harga = $this -> inp('txtHarga');
        $hargaClear = str_replace(",","",$harga);

        $tipeGambar     = array('png', 'jpg', 'jpeg');
        $namaFile       = $this -> getNameFile('txtFotoSrc');
        $tipeFile       = $this -> getTypeFile($namaFile);
        $sizeFile       = $_FILES['txtFotoSrc']['size'];

        $destination    = 'ladun/dasbor/img/menu/'.$kdMenu.".".$tipeFile;

        if($foto === ""){
            $this -> state($this -> sn) -> updateMenu($namaMenu, $deksMenu, $kategori, $satuan, $hargaClear, $kdMenu);
            $data['status'] = 'success';
        }else{
            if(in_array($tipeFile, $tipeGambar)){
                if($sizeFile < 2000){
                    $data['status'] = 'error_size_file';
                }else{
                    //hapus gambar sebelumnya
                    $dataMenu =  $this -> state($this -> sn) -> getDetailMenu($kdMenu);
                    $pic = $dataMenu['pic'];
                    $file = 'ladun/dasbor/img/menu/'.$pic;
                    unlink($file);
                    //upload gambar
                    $this -> uploadFile($sourcePath, $destination);
                    $this -> state($this -> sn) -> updateMenu($namaMenu, $deksMenu, $kategori, $satuan, $hargaClear, $kdMenu);
                    $data['status'] = 'success';
                }
            }else{
                $data['status'] = 'error_tipe_file';
            }
        }
        $this -> toJson($data);
    }
 
}