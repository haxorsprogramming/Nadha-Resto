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
        $data['status'] = 'sukses';
        $this -> toJson($data);
    }

}