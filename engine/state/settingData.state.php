<?php 

class settingData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getSettingData($kdSetting)
    {
        $this -> st -> query("SELECT value FROM tbl_setting WHERE kd_setting='$kdSetting';");
        $qs = $this -> st -> querySingle();
        return $qs['value'];
    }

}