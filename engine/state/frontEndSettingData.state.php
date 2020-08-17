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

    public function getPicName($idSlider)
    {
        $this -> st -> query("SELECT img FROM tbl_slider WHERE id='$idSlider';");
        $q = $this -> st -> querySingle();
        return $q['img'];
    }

    public function deleteSlider($idSlider)
    {
        $query = "DELETE FROM tbl_slider WHERE id='$idSlider';";
        $this -> st -> query($query);
        $this -> st -> queryRun();
    }

}