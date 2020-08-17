<?php

class frontEndSetting extends Route{
    //inisialisasi state
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
        $data['status'] = 'sukses';
        $data['foto'] = $this -> getTempFile('txtFoto');
        $this -> toJson($data);
    }

}