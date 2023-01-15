<?php

/**
 * @package Lastfm Connector
 */

namespace Inc;

final class Init {

	/**
	 * Store all the classes inside an array
	 *
	 * @return array entire list of classes
	 */

	public static function get_services() {
		return array(
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class,
		);
	}

	/**
	 * Loop through the classes, initializes them, and calls the register method if it exists
	 *
	 * @return
	 */

	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = self::instantiate( $class );
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}


	/**
	 * Initialize the class
	 *
	 * @param class
	 * @return class instance - new instance of the class
	 */

	private static function instantiate( $class ) {
		$service = new $class();

		return $service;
	}
}
