<?php
namespace PHPAutoloader\Classes\models;

use \PHPAutoloader\Classes\libraries\Database;

if ( ! defined( 'WPINC' ) ) {
	die;
}

  class Post {
    
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPosts(){

      $this->db->query("SELECT * FROM posts");

      return $this->db->fetchAll();
      
    }
  }