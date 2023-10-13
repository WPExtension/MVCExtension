<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-jwt-auth.php';

/**
 * The CRON functionality of the plugin.
 *
 * If the user agrees to share data, then we will send some data to the author of the plugin
 * to keep track opf the number of installations, the WP version and the PHP version used.
 */
require plugin_dir_path( __FILE__ ) . 'admin/class-jwt-auth-cron.php';

/**
 * Schedule an action if it's not already scheduled
 */
if ( ! wp_next_scheduled( 'jwt_auth_share_data' ) ) {
	wp_schedule_event( time(), 'weekly', 'jwt_auth_share_data' );
}

/**
 * Run the action that'll fire every week
 *
 * @return void
 */
function jwt_auth_share_data() {
	Jwt_Auth_Cron::collect();
}

/**
 * Hook into the action that'll fire every week
 */
add_action( 'jwt_auth_share_data', 'jwt_auth_share_data' );

/**
 * This runs during plugin deactivation.
 */
function deactivate_jwt_auth() {
	Jwt_Auth_Cron::remove();
}

/**
 * Hook into the action that'll fire during plugin deactivation
 */
register_deactivation_hook( __FILE__, 'deactivate_jwt_auth' );

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_jwt_auth() {
	$plugin = new Jwt_Auth();
	$plugin->run();
}


