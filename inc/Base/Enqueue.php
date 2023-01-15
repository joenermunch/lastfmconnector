<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Base;
use Inc\Base\BaseController;

class Enqueue extends BaseController {

	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	public function enqueue() {
		wp_enqueue_style( 'connector-styles', $this->plugin_url . 'assets/styles.css' );
		wp_enqueue_script( 'connector-scripts', $this->plugin_url . 'assets/scripts.js' );
	}

}
