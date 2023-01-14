<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Pages;

class Admin {


	public function register() {
		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );
	}

	public function add_admin_pages() {
		add_menu_page(
			'LastFM Connector Settings',
			'LastFM Connector',
			'manage_options',
			'lastfm_connector',
			array( $this, 'admin_pages' ),
			'dashicons-playlist-audio',
			110
		);
	}

	public function admin_pages() {
		require_once PLUGIN_PATH . '/templates/admin.php';
	}

}
