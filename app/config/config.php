<?php 

define('APP_DBHOST','localhost');
define('APP_DBNAME','postsapp');
define('APP_DBUSER','root');
define('APP_DBPSWRD','');

// App Root 
define('APPROOT', dirname(dirname(__FILE__)));

// FrameWork Loader ID
define('PHP_NAMESPACE_ID', 'PHPAutoloader');
define('PHP_NAMESPACE_ID_NAME', 'Classes');
define('BASE_DIR_SYSTEM_FILE', APPROOT . '/' ); 

// URL ROOT
define('URLROOT', 'http://localhost/apps/wp2/wp-admin/admin.php?page=mvc-extension');
// Defined Site name
define('SITENAME','MVC Training/Post app');

/**
 * Directory VIEW AND MODELS AND CONTROLLER
 * Defined constant DIR
 * Date August 10, 2023 
 * File Path: app/public/<.htaccess > 
 * 
    # <.htaccess > RewriteBase /v2/public
    # From: RewriteBase /v2/public
    # To: htdocs/projectname/public
    # Output < inline 4 >: RewriteBase /projectName/public
 *
 */


 
