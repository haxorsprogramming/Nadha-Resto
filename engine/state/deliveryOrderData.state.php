<?php 

class deliveryOrderData{
   
    private $st;

    public function __construct()
    {
        $this -> st = new state;
    }

    public function getJlhPesanan()
    {
        $this -> st -> query("SELECT id FROM tbl_delivery_order;");
        return $this -> st -> numRow();
    }

    public function getDataPesanan($requestData)
    {
        $this -> st -> query("SELECT * FROM tbl_delivery_order ORDER BY masuk DESC LIMIT ".$requestData['start']." ,".$requestData['length'].";");
        return $this -> st -> queryAll();
    }

    public function getTotalPesanan($kdPesanan)
    {
        $this -> st -> query("SELECT SUM(total) FROM tbl_temp_self_service WHERE kd_temp='$kdPesanan';");
        $q = $this -> st -> querySingle();
        return $q['SUM(total)'];
    }

}