<?php 

class mitraData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getMitra()
    {
        $this -> st -> query("SELECT * FROM tbl_mitra;");
        return $this -> st -> queryAll();
    }

}
