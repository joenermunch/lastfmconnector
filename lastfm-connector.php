<?php
/*
Plugin Name: Lastfm Connector
Plugin URI: https://joener.io
Description: Last.fm Connector is a WordPress plugin which allows you to display your top tracks from Last.fm as a shortcode.
Version: 1.0
Author: Joener Münch
Author URI: https://joener.io
License: GPL
Text Domain: lastfm-connector
*/

defined( 'ABSPATH' ) or die( 'Not authorized.' );
use Abraham\TwitterOAuth\TwitterOAuth;

// Require Composer Autoload
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}


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


// Initializes all of the core classes
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}
