<?php 
namespace PHPAutoloader\Classes\libraries;

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

  /**
   * WayPoint is a class that similar to a router however this version
   * design for hooks management url responsed,
   * @version 1.0.0
   * Type: Class   
   */
  class WayPoint {

    private $Registered_pages_param;
    private $Registered_page_single;
    private $Registered_handler;

    public function __construct( string $pages_param = null, string $single_page = null )
    {
        $this->Registered_pages_param = $pages_param;
        $this->Registered_page_single = $single_page;

        $this->Registered_handler = get_current_screen()?? '';
       
    }

   public function mvcextension_route_reg_page_url() {

       $URL = $this->Registered_pages_param;
   
       if(isset($_GET[$URL])) {
   
       $url = rtrim($_GET[$URL], '/');
       $url = filter_var($url, FILTER_SANITIZE_URL);
       $url = explode('/', $url );
       return $url;
   
       }
   
   }

    public function mvcextension_reg_constant( $screen ) {
      
     if(  $screen->parent_base === PLUGIN_SLUG) {
       return true;
     }

    }

    public function isValidPage() {

     if( ! $this->mvcextension_reg_constant( $this->Registered_handler ) ) { return; }

      if( !is_null($this->mvcextension_route_reg_page_url())){
        
         $url = $this->mvcextension_route_reg_page_url();
         if($url[0] == $this->Registered_page_single) {
           return true;
         }
         
     } 

   }

    public function call( $hook_name, ...$arg ) : void {

       do_action($hook_name, $arg);

    }

}

