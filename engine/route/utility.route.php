<?php

class utility extends Route{

    public function tesHash()
    {
        $password = $this ->  hashPassword('admin');
        echo $password;
    }

    public function getDataMenu()
    {
      $data['menu'] = $this -> state('utilityData') -> getDataMenu();
      $this -> toJson($data);
    }
    
}