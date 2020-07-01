<?php

class utility extends Route{

    public function tesHash()
    {
        $password = $this ->  hashPassword('admin');
        echo $password;
    }
    
}