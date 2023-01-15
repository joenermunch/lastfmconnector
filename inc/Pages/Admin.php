<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Pages;

use Inc\Api\SettingsAPI;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController {

	public $settings;
	public $callbacks;
	public $pages = array();
	

	public function register() {

		$this->settings = new SettingsAPI();
		$this->callbacks = new AdminCallbacks();
		$this->setPages();
		$this->settings->addPages( $this->pages )->register();
	}

	function setPages() {
		$this->pages = array(
			array(
				'page_title' => 'LastFM Connector Settings',
				'menu_title' => 'LastFM Connector',
				'capability' => 'manage_options',
				'menu_slug'  => 'lastfm_connector',
				'callback'   => array($this->callbacks, 'adminDashboard'),
				'icon_url'   => 'dashicons-playlist-audio',
				'position'   => 110,
			),
		);
	}


}
