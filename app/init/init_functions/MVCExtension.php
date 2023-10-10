<?php 

new \PHPAutoloader\Classes\controllers\MVCExtension;

use \PHPAutoloader\Classes\libraries\WayPoint;

// Define constants

define( 'PLUGIN_ROLE', 'manage_options' );
define( 'PLUGIN_DOMAIN', 'your-plugin-text-domain' );

add_action( 'admin_menu', 'register_your_plugin_menu', 9 );

function register_your_plugin_menu() {
	add_menu_page(
		__( 'Your Plugin', PLUGIN_DOMAIN ),
		'MVC Extension',
		PLUGIN_ROLE,
		PLUGIN_SLUG,
		false,
		'dashicons-admin-generic',
		''
	);

	add_submenu_page(
		PLUGIN_SLUG,
		'Your Plugin',
		'Dashboard',
		PLUGIN_ROLE,
		PLUGIN_SLUG,
		'your_plugin_dashboard',
	);
 
  function your_plugin_dashboard( )  {
     
	$about = new WayPoint('pages','about');
	if( $about->isValidPage() ) {
		$about->call('about_mvc_callback_content');

	} else {

	   $setting = new WayPoint('pages','settings');
	   if( $setting->isValidPage() ) {
	   echo 'Setting page';

	   } else {

		 $home = new WayPoint();
		 if( !$home->isValidPage() ) {
		 $home->call('home_mvc_callback_content');
		 
		}
	  }
	}
  }

}
