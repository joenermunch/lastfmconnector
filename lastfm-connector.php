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

if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename( __FILE__ ) );

if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}
