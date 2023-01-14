<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Base;

class Enqueue {

	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	public function enqueue() {
		wp_enqueue_style( 'connector-styles', PLUGIN_URL . 'assets/styles.css' );
		wp_enqueue_script( 'connector-scripts', PLUGIN_URL . 'assets/scripts.js' );
	}

}
