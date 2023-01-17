<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Api;

use Inc\Base\BaseController;

class LastfmAPI extends BaseController {

	public $api_key;

	public function __construct() {
		$this->api_key = get_option( 'last_fm_api_key' );
	}

	public function connectFM( $atts ) {
		$api_key  = get_option( 'last_fm_api_key' );
		$username = $atts['username'];
		$period   = isset( $atts['period'] ) ? $atts['period'] : 'overall';
		$url      = "http://ws.audioscrobbler.com/2.0/?method=user.gettoptracks&user=$username&api_key=$api_key&limit=15&period=$period&format=json";
		$response = wp_remote_get( $url );
		$data     = json_decode( wp_remote_retrieve_body( $response ), true );
		return $data;
	}

	public function topTracks( $atts ) {
		$data       = $this->connectFM( $atts );
		$top_tracks = array();
		foreach ( $data['toptracks']['track'] as $track ) {
			$top_tracks[] = array(
				'name'   => $track['name'],
				'artist' => $track['artist']['name'],
				'plays'  => $track['playcount'],
			);
		}
		return $top_tracks;
	}

	public function getTopTracksString( $atts ) {

		$top_tracks = $this->topTracks( $atts );

		$output = '';

		foreach ( $top_tracks as $track ) {
			$track_string = $track['name'] . ' by ' . $track['artist'] . ' (' . $track['plays'] . ' plays), ';
			if ( strlen( $output ) + strlen( $track_string ) < 280 ) {
				$output .= $track_string;
			} else {
				$output = substr( $output, 0, strrpos( $output, ', ' ) );
				break;
			}
		}

		return $output;
	}
}
