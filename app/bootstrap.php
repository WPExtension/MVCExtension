<?php 

/**
 * @copyright (c) 2023 MVCExtensionm v1.0.0 Cooked by nielsoffice 
 *
 *  GPL-2.0+ License
 *
 * PHPWine\VanillaFlavour v1.4.0.0 free software: you can redistribute it and/or modify.
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 * @category   PHP MVC Framework for WordPress 
 * @package    Plugin boilterplate by  wpbb.me
 *            
 *            
 * @author    Leinner Zednanref <nielsoffice.wordpress.php@gmail.com>
 * @license    GPL-2.0+ License
 * @link      https://github.com/WPExtension/MVCExtension
 * @link      https://github.com/WPExtension/MVCExtension/blob/main/README.txt
 * @link      https://linktree.com/nielsoffice
 * @version   v1.0.0
 * @since     08.11.2023
 *
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

  $mvc_extension_init = new Class  {
  
  public function __construct()
  {

    if( method_exists($this,'func_file') ) 
    { 
      
      /* Register file on config here */ 
      $___requires = [
        'config' => 'config/config'
        ,'configRegisterPath' => 'config/config-register-path' 
        ,'configRegisterSettings' => 'config/config-register-settings'               
      ];

      $this->func_file( $___requires ); 
    
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
    spl_autoload_register(function($class) 
    {
              
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

    if( method_exists($this,'___syncLoadFunctions') ) {

      /* framework function application */ 
      $this->___syncLoadFunctions( ___directories : Settings::framework_app_functions()); 
     
      /* sync_functions Folder only accept a function NOT a class */ 
      $this->___syncLoadFunctions( ___directories : Settings::sync_function(), sc : true); 
     
      /* sync_functions Folder only accept a class NOT a function */  
      $this->___syncLoadFunctions( ___directories : Settings::sync_class()); 
       
    }

  }

  /**
  * Initialized core file framework config
  * Register file config to be load 
  * Load App MVC Framework Helper
  * @since     1.0.0
  * @return    MVC_Framework_For_WordPress  */
  private function func_file( $__rs ) 
  {

   foreach ( $__rs as $require ){ require_once( $require . '.php' ); }

  }

  /**
  * Request file to load Helper and Libraries folder
  * If sync_class < function > files is NOT allowed
  * If sync_function < class > files is NOT allowed
  * Load Project Syncronized both mvc and wp helpers in function file !
  * @since     1.0.0
  * @return    MVC_Framework_For_WordPress */
  private function ___syncLoadFunctions( string|Settings $___directories = null , bool $sc = false ) : void { 

   if(!is_null($___directories)) {   

    $___wineGetAllRun = new DirectoryIterator( $___directories );
    
    foreach ($___wineGetAllRun as $appRequest) {  
      
     if (!$appRequest->isDot() && $sc != true ) { 
      require ( $___directories . $appRequest->getFilename() ); 
     } else if (!$appRequest->isDot() && $sc == true ) { 
      require_once( $___directories . $appRequest->getFilename() ); 
     } 
    
    }
  }  
 }

};










