<?php

class monitoring extends Route{

    private $sn = 'monitoringData';

    public function index()
    {
        $data['meja'] = $this -> state($this -> sn) -> getDataMeja();
        $this -> bind('dasbor/monitoring/monitoring', $data);
    }

    public function setActive()
    {
        $kdMeja = $this -> inp('kdMeja');
        $this -> state($this -> sn) -> setMejaActive($kdMeja);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

    public function setLeave()
    {
        $kdMeja = $this -> inp('kdMeja');
        $this -> state($this -> sn) -> setMejaLeave($kdMeja);
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}