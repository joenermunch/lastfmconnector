<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Pages;

use Inc\Api\SettingsAPI;
use Inc\Base\BaseController;
use Inc\Api\Callbacks\AdminCallbacks;
use Inc\Api\LastfmAPI;



class Admin extends BaseController {

	public $settings;
	public $callbacks;
	public $lastfm;
	public $pages = array();
	public $config;
	public $twitter;
	public $user_id;



	public function register() {
		$this->settings  = new SettingsAPI();
		$this->callbacks = new AdminCallbacks();
		$this->lastfm    = new LastfmAPI();
		$this->config    = require_once $this->plugin_path . '/config.php';
		$this->setPages();
		$this->setSettings();
		$this->setSections();
		$this->setFields();
		$this->settings->addPages( $this->pages )->register();
	}


	function setPages() {
		$this->pages = array(
			array(
				'page_title' => 'LastFM Connector Settings',
				'menu_title' => 'LastFM Connector',
				'capability' => 'manage_options',
				'menu_slug'  => 'lastfm_connector',
				'callback'   => array( $this->callbacks, 'adminDashboard' ),
				'icon_url'   => 'dashicons-playlist-audio',
				'position'   => 110,
			),
		);
	}

	function setSettings() {
		$args = array(
			array(
				'option_group' => 'lastfm_connector_options_group',
				'option_name'  => 'last_fm_api_key',
				'callback'     => array( $this->callbacks, 'optionsGroup' ),
			),
			array(
				'option_group' => 'lastfm_connector_options_group',
				'option_name'  => 'global_username',
				'callback'     => array( $this->callbacks, 'optionsGroup' ),
			),
		);

		$this->settings->setSettings( $args );
	}

	function setSections() {
		$args = array(
			array(
				'id'       => 'lastfm_connector_admin_index',
				'title'    => 'Settings',
				'callback' => array( $this->callbacks, 'adminSection' ),
				'page'     => 'lastfm_connector',
			),
		);

		$this->settings->setSections( $args );
	}

	function setFields() {
		$args = array(
			array(
				'id'       => 'last_fm_api_key',
				'title'    => 'Last.fm API Key',
				'callback' => array( $this->callbacks, 'apiInput' ),
				'page'     => 'lastfm_connector',
				'section'  => 'lastfm_connector_admin_index',
				'args'     => array(
					'label_for' => 'last_fm_api_key',
					'class'     => 'form-fm',
				),
			),
			array(
				'id'       => 'global_username',
				'title'    => 'Global Username',
				'callback' => array( $this->callbacks, 'globalUsernameInput' ),
				'page'     => 'lastfm_connector',
				'section'  => 'lastfm_connector_admin_index',
				'args'     => array(
					'label_for' => 'global_username',
					'class'     => 'form-fm',
				),
			),
		);

		$this->settings->setFields( $args );
	}

}
