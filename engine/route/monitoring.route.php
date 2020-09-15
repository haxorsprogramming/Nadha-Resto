<?php

class monitoring extends Route{

    private $sn = 'monitoringData';
    private $su = 'utilityData';
    
    public function index()
    {
        $this -> state($this -> su) -> csrfCek();
        $data['meja'] = $this -> state($this -> sn) -> getDataMeja();
        $this -> bind('dasbor/monitoring/monitoring', $data);
    }

    public function setActive()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdMeja = $this -> inp('kdMeja');
        $this -> state($this -> sn) -> setMejaActive($kdMeja);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function setLeave()
    {
        $this -> state($this -> su) -> csrfCek();
        $kdMeja = $this -> inp('kdMeja');
        $this -> state($this -> sn) -> setMejaLeave($kdMeja);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}