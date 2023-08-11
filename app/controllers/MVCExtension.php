<?php 
namespace PHPAutoloader\Classes\controllers;

use \PHPAutoloader\Classes\libraries\Controller;
use \PHPAutoloader\Classes\models\Post;

class MVCExtension extends Controller {

   private $postModel;

   public function __construct() {
      
       $this->postModel = new Post();

      add_action('admin_content_extnesion',[$this,'content_extension']);

   }
   
   public function content_extension() {

     $all = $this->postModel->getPosts();


     $data = [
        'title' => 'Welcome to Home page',
        'description' => 'This is frist app mvc share post'   ,
        'id' => $all  
      ];

      // echo 'Index page load Controller' ;
      $this->view('pages/index', $data );

   }
}

