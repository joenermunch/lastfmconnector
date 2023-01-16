<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController {

	public function adminDashboard() {
		return require_once $this->plugin_path . '/templates/admin.php';
	}

	public function optionsGroup( $input ) {
		return $input;
	}

	public function adminSection() {
		echo '<p><a target="_blank" rel="noopener" href="https://www.last.fm/api">Click here</a> to get an api key.</p>';
	}

	public function apiInput() {

		$value = esc_attr( get_option( 'last_fm_api_key' ) );

		echo '<input type="text" class="regular-text" name="last_fm_api_key" value="' . $value . '" placeholder="Last.fm API Key">';
	}

	public function globalUsernameInput() {

		$value = esc_attr( get_option( 'global_username' ) );

		echo '<input type="text" class="regular-text" name="global_username" value="' . $value . '" placeholder="Global username">';
	}

}
