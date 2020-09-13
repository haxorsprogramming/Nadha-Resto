<?php 

class userData{

  public function getUser()
  {
    $this -> st -> query("SELECT * FROM tbl_user;");
    return $this -> st -> querySingle();
  }
  
}
