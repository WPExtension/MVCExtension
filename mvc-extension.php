<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://linktr.ee/nielsoffice
 * @since             1.0.0
 * @package           Mvc_Extension
 *
 * @wordpress-plugin
 * Plugin Name:       MVCExtension
 * Plugin URI:        https://github.com/WPExtension/MVCExtension
 * Description:       WP Extension is a WordPress MVC framework. Design to build application wp plugin maintainable and secure codes.
 * Version:           1.0.0
 * Author:            nielsoffice
 * Author URI:        https://linktr.ee/nielsoffice
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mvc-extension
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
 define( 'MVC_EXTENSION_VERSION', '1.0.0' );

/**
 * MVC Extension init.
 * Start at version 1.0.0 
 */
 if( !function_exists('initMVCExtension') ) {
	function initMVCExtension() {
	  if( file_exists( plugin_dir_path( __FILE__ ) .'app/bootstrap.php' )) { 
		require_once ( plugin_dir_path( __FILE__ ) .'app/bootstrap.php'); } 
	  else { die('Initialized files bootstrap doesn\'t exist'); }
	}
  initMVCExtension();
 }

 $PACKAGE_DIR = [
    'APPLICATION_PASSWORD' =>  'vendor/application-passwords/class.application-passwords.php',
    'CMB2' => 'vendor/cmb2/init.php',	
 ];

 if( file_exists( plugin_dir_path( __FILE__ ) . $PACKAGE_DIR['CMB2']) &&
     file_exists( plugin_dir_path( __FILE__ ) . $PACKAGE_DIR['APPLICATION_PASSWORD']) ) 
  { 
  
   require_once ( plugin_dir_path( __FILE__ ) . $PACKAGE_DIR['CMB2'] );
   CMB2_Bootstrap_2101::initiate();
	 
   define( 'APPLICATION_PASSWORDS_VERSION', '0.1.3' );
   require_once ( plugin_dir_path( __FILE__ ) . $PACKAGE_DIR['APPLICATION_PASSWORD'] ); 
   Application_Passwords::add_hooks();

  } else { 
  
   die('Initialized package plugins doesn\'t exist'); 

  }

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mvc-extension-activator.php
 */
function activate_mvc_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mvc-extension-activator.php';
	Mvc_Extension_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mvc-extension-deactivator.php
 */
function deactivate_mvc_extension() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mvc-extension-deactivator.php';
	Mvc_Extension_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_mvc_extension' );
register_deactivation_hook( __FILE__, 'deactivate_mvc_extension' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mvc-extension.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mvc_extension() {

	$plugin = new Mvc_Extension();
	$plugin->run();

}
run_mvc_extension();
