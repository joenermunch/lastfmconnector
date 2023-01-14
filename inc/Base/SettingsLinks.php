<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Base;

class SettingsLinks {


	function __construct() {
	}

	public function register() {
		add_filter( 'plugin_action_links_' . PLUGIN, array( $this, 'settings_link' ) );
	}

	public function settings_link( $links ) {
		$settings_link = '<a href="admin.php?page=lastfm_connector">Settings</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}
