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

    public function saveSlider($subHeader, $judul, $subJudul, $picName, $capButton, $link)
    {
        $query = "INSERT INTO tbl_slider VALUES(null, '$subHeader','$judul','$subJudul','$picName','$capButton','$link');";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

}