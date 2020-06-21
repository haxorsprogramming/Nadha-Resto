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
        $sourcePath = $this -> getTempFile('txtFoto');
        $namaFile = $this -> getNameFile('txtFoto');
        $tipeFile = $this -> getTypeFile($namaFile);
        $sizeFile = $this -> getSizeFile('txtFoto');
        $namaPic = $this -> rnstr(8);
        $destination = '/ladun/'.$namaPic.".".$tipeFile;

        if($tipeFile === 'jpg' || $tipeFile === 'png' || $tipeFile === 'jpeg'){
            if($sizeFile > 2044070){
                $data['status'] = 'error_size_file';
            }else{
                if(move_uploaded_file($sourcePath, $destination)){ 
            
                }
                $data['status'] = 'success';
            }
        }else{
            $data['status'] = 'error_tipe_file';
        }
        $data['sumber'] = $sourcePath;
        $this -> toJson($data);
    }

}