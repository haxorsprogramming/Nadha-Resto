<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

class Props{

    protected $route = MAINROUTE;
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
       $url = $this -> cekUrl();
       if( file_exists('engine/route/'.$url[0].'.route.php')){
           $this -> route = $url[0];           
           unset($url[0]);
       }     
       require_once 'engine/route/'.$this->route.'.route.php';
       $this -> route = new $this -> route;

       if(isset($url[1])){
           if(method_exists($this -> route, $url[1])){
               $this -> method = $url[1];
               unset($url[1]);
           }
       }
      
       if( !empty($url)){
        $this->params = array_values($url);       
        //  require_once 'engine/error/no_route.html';
        //  die();
       }
       call_user_func_array([$this -> route, $this -> method], $this -> params);

    }

    public function cekUrl()
    {
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'],'/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }
    }    
}
