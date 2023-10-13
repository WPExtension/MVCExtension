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

class Database {
 
    protected string $host = APP_DBHOST;
    protected string $dbname = APP_DBNAME;
    protected string $user = APP_DBUSER;
    protected string $pswrd = APP_DBPSWRD; 

    private object $dbh;
    private object $stmt;
    private string $error;

    public function __construct(){
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
          \PDO::ATTR_PERSISTENT => true,
          \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        );
  
        // Create PDO instance
        try{
          $this->dbh = new \PDO($dsn, $this->user, $this->pswrd, $options);
        } catch(\PDOException $e){
          $this->error = $e->getMessage();
          echo $this->error;
        }
      }

  // Prepare statement with query
    public function query($sql){
      $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind values
    public function bind($param, $value, $type = null){
      if(is_null($type)){
        switch(true){
          case is_int($value):
            $type = \PDO::PARAM_INT;
            break;
          case is_bool($value):
            $type = \PDO::PARAM_BOOL;
            break;
          case is_null($value):
            $type = \PDO::PARAM_NULL;
            break;
          default:
            $type = \PDO::PARAM_STR;
        }
      }

      $this->stmt->bindValue($param, $value, $type);
    }

    // Execute the prepared statement
    public function execute(){
      return $this->stmt->execute();
    }

    // Get result set as array of objects
    public function fetchAll(){
      $this->execute();
      return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    // Get single record as object
    public function fetch(){
      $this->execute();
      return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }

    // Get row count
    public function rowCount(){
      return $this->stmt->rowCount();
    }

}