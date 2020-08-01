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

    public function getFirebaseConfig($kdSetting)
    {
        $this -> st -> query("SELECT value FROM tbl_firebase_config WHERE kd_setting='$kdSetting';");
        $qs = $this -> st -> querySingle();
        return $qs['value'];
    }

    public function updateData($kdSetting, $value)
    {
        $query = "UPDATE tbl_setting SET value='$value' WHERE kd_setting='$kdSetting';";
        $this -> st -> query($query);
        $this -> st -> queryAll();
    }

}