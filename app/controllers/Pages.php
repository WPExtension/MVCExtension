<?php 


use \PHPAutoloader\Classes\libraries\Controller;

class Pages extends Controller {

    private $postModel;

    public function __construct()
    {
       $this->postModel = $this->model('Post');
    }

    public function index() {

      $data2 = new Person;

      $data = [
        'title' => 'Welcome to Home page',
        'description' => 'This is frist app mvc share post',
        'id' => $data2
      ];

      // echo 'Index page load Controller' ;
      $this->view('pages/index', $data );

    }

    public function about() {
      
      $data = [
        'title' => 'Welcome to About page',
        'description' => 'This is frist app mvc share post'
      ];
    
      $this->view('pages/about', $data );

    }
}