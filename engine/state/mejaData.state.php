<?php 

class mejaData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getDataMeja()
    {
        $this -> st -> query("SELECT * FROM tbl_meja;");
        return $this -> st -> queryAll();
    }

}