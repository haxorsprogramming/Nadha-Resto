<?php 

class frontEndSettingData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataSlider()
    {
        $this -> st -> query("SELECT * FROM tbl_slider;");
        return $this -> st -> queryAll();
    }

}