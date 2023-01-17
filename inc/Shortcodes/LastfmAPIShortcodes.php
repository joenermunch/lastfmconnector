<?php

/**
 * @package Lastfm Connector
 */

namespace Inc\Shortcodes;

use Inc\Base\BaseController;
use Inc\Api\LastfmAPI;

class LastfmAPIShortcodes extends BaseController {

	public $api_key;
	public $last_fm;

	public function __construct() {
		$this->last_fm = new LastfmAPI();
		$this->api_key = get_option( 'last_fm_api_key' );
		add_shortcode( 'lastfm_top_tracks', array( $this, 'topTracks' ) );
	}

	public function topTracks( $atts ) {
		$data = $this->last_fm->connectFM( $atts );

		$output = '';
		if ( isset( $data['error'] ) ) {
			$output = 'Error: ' . $data['message'];
		} elseif ( isset( $data['toptracks']['track'] ) ) {
			$tracks  = $data['toptracks']['track'];
			$output .= '<ul class="stats-fm">';
			$i       = 0;
			foreach ( $tracks as $track ) {
				if ( $i < 9 ) {
					$artist_name     = $track['artist']['name'];
					$album_image_url = $this->get_latest_album_image( $artist_name );
					if ( ! empty( $album_image_url ) ) {
						$output .= '<li><img src="' . $album_image_url . '" ><span class="track-name">' . $track['name'] . '</span><span class="track-artist">' . $artist_name . '</span><span class="track-playcount">' . $track['playcount'] . ' plays</span>' . '</li>';
						++$i;
					}
				}
			}
			$output .= '</ul>';
		}
		return $output;
	}

	public function get_latest_album_image( $artist_name ) {
		$url      = "http://ws.audioscrobbler.com/2.0/?method=artist.gettopalbums&artist=$artist_name&api_key=$this->api_key&format=json";
		$response = wp_remote_get( $url );
		$data     = json_decode( wp_remote_retrieve_body( $response ), true );
		if ( isset( $data['topalbums']['album'][0]['image'][3]['#text'] ) ) {
			return $data['topalbums']['album'][0]['image'][3]['#text'];
		}
		return '';
	}


}
