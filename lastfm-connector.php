<?php
/*
Plugin Name: Lastfm Connector
Plugin URI: [Plugin URI]
Description: [Short Description of the plugin]
Version: [Version Number]
Author: [Author Name]
Author URI: [Author URI]
License: [License]
Text Domain: [Text Domain for localization]
*/

defined( 'ABSPATH' ) or die( 'Not authorized.' );

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}
