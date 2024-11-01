<?php
/*
Plugin Name: Spotify Play Button
Version: 1.0
Plugin URI: http://wolfiezero.com/wordpress/spotify-play-button/
Description: Adds the Spotify Play Button to your post or page content
Author: WolfieZero
Author URI: http://wolfiezero.com/
*/

add_shortcode('spotify-play', 'showSpotifyPlayButton');

function showSpotifyPlayButton($args) {
	
	// https://developer.spotify.com/technologies/spotify-play-button/documentation/

	$src	= '';
	$size	= '';
	$theme	= '';
	$view	= '';
	$h 		= '380px';
	$w		= '300px';


	if (isset($args['size']) && $args['size'] == 'compact') {
		$h 		= '80px';
	}

	if (isset($args['theme'])) {	// dark* 	| light 		=> &theme=white
		$theme 	= '&amp;theme='.$args['theme'];
	}

	if (isset($args['view'])) {		// list* 	| cover art		=> &view=coverart
		$view	= '&amp;view='.$args['view'];	
	}

	if (isset($args['src'])) 	$src	= $args['src'];		// Spotify URI
	if (isset($args['width']))	$w		= $args['width'];
	if (isset($args['height']))	$h		= $args['height'];

	$html = '<iframe src="https://embed.spotify.com/?uri='.$src.$theme.$view.'" style="width:'.$w.'; height:'.$h.';" frameborder="0" allowTransparency="true"></iframe>';

	return $html;

}