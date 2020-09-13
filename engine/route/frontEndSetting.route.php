<?php
// FRONT END SETTING ROUTE 
class frontEndSetting extends Route{
    // INISIALISASI STATE 
    private $sn = 'frontEndSettingData';
    private $su = 'utilityData';

    public function __construct()
    {
        $this -> st = new state;
    }

    public function index()
    {     
        echo "<pre>Mooo ...</pre>";
    }

    public function sliderUtama()
    {
        $data['slider'] = $this -> state($this -> sn) -> getDataSlider();
        $this -> bind('dasbor/frontEndSetting/sliderUtama', $data);
    }

    public function prosesTambahSlider()
    {
        $namaFile       = $this -> getNameFile('txtFoto');
        $tipeGambar     = array('png', 'jpg', 'jpeg');
        $tipeFile       = $this -> getTypeFile($namaFile);
        $idFile         = $this -> rnint(5);
        $fileTemp       = $this -> getTempFile('txtFoto');
        $sizeFile       = $_FILES['txtFoto']['size'];
        $destination    = 'ladun/home/img/slider/'.$idFile.'.'.$tipeFile;
        $picName        = $idFile.".".$tipeFile;
        //table data
        $judul          = $this -> inp('txtJudul');
        $subHeader      = $this -> inp('txtSubHeader');
        $subJudul       = $this -> inp('txtSubJudul');
        $capButton      = $this -> inp('txtCaptionButton');
        $link           = $this -> inp('txtLink');

        if(in_array($tipeFile, $tipeGambar)){
            if($sizeFile < 2000){
                $data['status'] = 'error_size_file';
            }else{
                $this -> uploadFile($fileTemp, $destination);
                $this -> state($this -> sn) -> saveSlider($subHeader, $judul, $subJudul, $picName, $capButton, $link);
                $data['status'] = 'sukses';
            }
        }else{
            $data['status'] = 'error_tipe_file';
        }
        
        $this -> toJson($data);
    }

    public function prosesHapusSlider()
    {
        $idSlider       = $this -> inp('id');
        $imgName        = $this -> state($this -> sn) -> getPicName($idSlider);
        $file           = 'ladun/home/img/slider/'.$imgName;
        $this -> state($this -> sn) -> deleteSlider($idSlider);
        unlink($file);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function specialOffer()
    {
        echo "aaa";
    }

}