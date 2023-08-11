<?php 

namespace PHPAutoloader\Classes\libraries;

class Controller {

    // Load model
    public function model( $model ) {

       $obj = " new \\".PHP_NAMESPACE_ID."\\".PHP_NAMESPACE_ID_NAME."\libraries\models\\".$model;
       return $obj;
       
    }

    // Load views
    public function view($view, $data = []) {

      if( file_exists( APPVIEWS . ucwords($view) . PHP_EXTENSION )) { require_once APPVIEWS . ucwords($view) . PHP_EXTENSION; }
       else { die('View doesn\'t exist'); }

    }

}