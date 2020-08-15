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
        $this -> bind('dasbor/frontEndSetting/slideUtama');
    }

}