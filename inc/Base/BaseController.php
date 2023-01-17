<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Base;

class BaseController {

	public $plugin_path;

	public $plugin_url;

	public $plugin;


	public function __construct() {
		$this->plugin_path = plugin_dir_path( dirname( __DIR__, 1 ) );
		$this->plugin_url  = plugin_dir_url( dirname( __DIR__, 1 ) );
		$this->plugin      = plugin_basename( dirname( __DIR__, 2 ) ) . '/lastfm-connector.php';
	}


}
