<?php 

/**
* Initialized core file framework config
* Register file config to be load 
* Load App MVC Framework Helper
* @since     1.0.0
* @return    MVC_Framework_For_WordPress 
*/
if( !function_exists('func_file') ) {

  /* Register file on config here */ 
  $___requires = [
    'config' => 'config/config'
   ,'configRegisterPath' => 'config/config-register-path' 
   ,'configRegisterSettings' => 'config/config-register-settings'               
 ];

 function func_file($__rs) {
   foreach ( $__rs as $require){ 
     require_once( $require . '.php' ); 
   }
 }
 func_file($___requires);
}

/**
* Request file to load Helper and Libraries folder
* If sync_class < function > files is NOT allowed
* If sync_function < class > files is NOT allowed
* Load Project Syncronized both mvc and wp helpers in function file !
* @since     1.0.0
* @return    MVC_Framework_For_WordPress 
*/
 if( !function_exists('___syncLoadFunctions') ) {
 
  function ___syncLoadFunctions( string|Settings $___directories = null , bool $sc = false ) : void { 

   if(!is_null($___directories)) {   

    $___wineGetAllRun = new DirectoryIterator( $___directories );
    
    foreach ($___wineGetAllRun as $appRequest) {  
      
     if (!$appRequest->isDot() && $sc != true ) { 
        require_once( $___directories . $appRequest->getFilename() ); 
     } else if (!$appRequest->isDot() && $sc == true ) { 
        require( $___directories . $appRequest->getFilename() ); 
     } 
    
    }
  }  
 }

  /* framework function application */ 
  ___syncLoadFunctions( ___directories : Settings::framework_app_functions()); 
 
  /* sync_functions Folder only accept a function NOT a class */ 
  ___syncLoadFunctions( ___directories : Settings::sync_function(), sc : true); 
 
  /* sync_functions Folder only accept a class NOT a function */  
  ___syncLoadFunctions( ___directories : Settings::sync_class()); 

 }

/**
* Default Autoloader
* # Primary or root folder
* namespace PHPAutoloader\Classes;
* # Sub folder
* namespace PHPAutoloader\Classes\system; 
* Instantiate Default
* $PHPLoader = NEW \PHPAutoloader\Classes\system\DataClass(); 
* Instantiate Alias
* USE \PHPAutoloader\Classes\system\DataClass AS PHPLoader();
* Calling the classe instantiated
* $DataClass    = new PHPLoader();
* @since     1.0.0
* @return    MVC_Framework_For_WordPress 
*/
 spl_autoload_register(function($class) {
           
  // File name space
  $systemFileRequest = AUTH_DIRECTORY_FILE_REQUEST;
          
  // base directory system file
  $sourceFileRquest  = BASE_DIR_SYSTEM_FILE;                
  if (strncmp($systemFileRequest, $class, strlen($systemFileRequest)) !== 0) return;
          
  // Directory system data files
  $dataRequest = $sourceFileRquest . str_replace('\\', '/', substr($class, strlen($systemFileRequest))) . PHP_EXTENSION;
          
  // if the file exists, require it
  (file_exists($dataRequest)) ? require $dataRequest : false;
          
 });


 use \PHPAutoloader\Classes\libraries\Core;

 // init Core library 
 $core = new Core;



