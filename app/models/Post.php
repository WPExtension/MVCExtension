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

      $this->db->query("SELECT * 
                        FROM wp_posts 
                        WHERE post_type = 'post' 
                        AND post_status = 'publish' 
                      ");

      return $this->db->fetchAll();
      
    }
  }