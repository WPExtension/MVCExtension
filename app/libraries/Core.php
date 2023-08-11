<?php 
namespace PHPAutoloader\Classes\libraries;

/** 
 * App core class
 * URL FORMAT - /controller/method/params */

Class Core {
  
  /* Default URL to load if there's no request from URL
   * ex. http://localhost/mvc/v1/public/
   * this will load the property $currentController */ 
   protected $currentController = 'Pages';
   protected $currentMethod = 'Index';
   protected $params = [];

   public function __construct()
   {

     $url = $this->getURL();

     var_dump($_GET['extension']);
   
    // &pages/

     if( !is_null($url) ) { // < pages/about/66 | users/account >

        // Look for controller for first index/value
        if(file_exists( APPCTRL . ucwords($url[0]) . PHP_EXTENSION )){

            $this->currentController = ucwords($url[0]);
            // unset 0 index 
            unset($url[0]);
        }

     } 

     require_once APPCTRL . $this->currentController . PHP_EXTENSION;

     $this->currentController = new $this->currentController;

     // Check for the second part of URL
     // ex. http://localhost/mvc/v1/public/pages/<about>

     if(isset($url[1])) {
      if( method_exists($this->currentController, $url[1]) ) {
        
        $this->currentMethod = $url[1];
        // unset url 1 
        unset($url[1]);

      }
     }
     
     // Get method param
     $this->params = $url ? array_values($url) : [];

     // call back with array params
     call_user_func_array([$this->currentController, $this->currentMethod], $this->params);

   }

   public function getURL() {
    
    if(isset($_GET['url'])) {

      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url );
      return  $url;

    }

   }

}
