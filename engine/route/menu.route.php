<?php

class menu extends Route{

    private $sn = 'menuData';

    public function index()
    {
        $data['menu'] = $this -> state($this -> sn) -> getMenu(); 
        $this -> bind('/dasbor/menu/menu', $data);
    }

    public function tambahMenu()
    {
        $data['kategori'] = $this -> state($this -> sn) -> getKategori();
        $this -> bind('/dasbor/menu/formTambahMenu', $data);
    }

    public function prosesTambahMenu()
    {
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
        $destination    = 'ladun/dasbor/img/menu/'.$kdMenu.".".$tipeFile;
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
 
}