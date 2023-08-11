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
define('URLROOT', 'https://localhost/apps/wp2/wp-admin/admin.php?page=mvc-extension');
// Defined Site name
define('SITENAME','MVCExtension');
 
