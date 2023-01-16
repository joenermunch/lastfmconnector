<?php
/*
Plugin Name: Lastfm Connector
Plugin URI: https://joener.io
Description: A plugin that allows the user to showcase their top tracks using Last.fm's API.
Version: 0.1
Author: Joener Münch
Author URI: https://joener.io
License: GPL
Text Domain: lastfm-connector
*/

defined( 'ABSPATH' ) or die( 'Not authorized.' );


// Require Composer Autoload
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// // Define Constants
// define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
// define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
// define( 'PLUGIN', plugin_basename( __FILE__ ) );

// Runs on activation
function activate_lastfm_connector() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_lastfm_connector' );


// Runs on deactivation
function deactivate_lastfm_connector() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_lastfm_connector' );

if ( ! function_exists( 'twitter_api_get' ) ) {
	require __DIR__ . '/twitter-api/wp-twitter-api/twitter-api.php';
}

// twitter_api_post(
// 	'statuses/update',
// 	array(
// 		'status' => 'a',
// 	)
// );

// Initializes all of the core classes
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}
