<?php 
namespace PHPAutoloader\Classes\controllers;

use \PHPAutoloader\Classes\libraries\Controller;
use \PHPAutoloader\Classes\models\Post;

class MVCExtension extends Controller {

   private $postModel;

   public function __construct() {
      
       $this->postModel = new Post();

      add_action('home_mvc_callback_content', [$this,'home_content_extension']);
      add_action('about_mvc_callback_content',[$this,'about_content_extension']);

   }
   
   public function home_content_extension() {

     $all = $this->postModel->getPosts();

     $data = [
        'title' => 'Welcome to Home page',
        'description' => 'This is frist app mvc share post'   ,
        'id' => $all  
      ];

      // echo 'Index page load Controller' ;
      $this->view('pages/index', $data );

   }

   public function about_content_extension() {

      $all = $this->postModel->getPosts();
 
      $data = [
         'title' => 'Welcome to About page',
         'description' => 'This is frist app mvc share post'   ,
         'id' => $all  
       ];
 
       // echo 'Index page load Controller' ;
       $this->view('pages/about', $data );
 
    }
}

