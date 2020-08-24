<?php 

class statistikData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getMenuTerlaris()
    {
        $this -> st -> query("SELECT nama, total_dipesan FROM tbl_menu;");
        return $this -> st -> queryAll();
    }

}