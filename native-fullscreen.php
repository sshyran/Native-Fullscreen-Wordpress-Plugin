<?php
/*
Plugin Name: Native Fullscreen
Plugin URI: http://webmaestro.fr/blog/?p=482
Description: Fullscreen mode just got real. This is based on John Dyer's <a href="http://johndyer.name/native-fullscreen-javascript-api-plus-jquery-plugin/">Native Fullscreen JavaScript API</a>.
Version: 1.0
Author: WebMaestro.Fr
Author URI: http://webmaestro.fr/blog/
License: GPL2
*/

class Native_Fullscreen {

	static function init() {
		add_shortcode('fullscreen', array(__CLASS__, 'get_button'));
	}
 
	static function get_button($atts) {
		wp_enqueue_script('nativefullscreen', plugins_url('js/nativefullscreen.js', __FILE__), array('jquery'));
		wp_enqueue_style('nativefullscreen', plugins_url('css/nativefullscreen.css', __FILE__));
		return '<input type="button" value="'.($atts['text'] ? $atts['text'] : 'Go Fullscreen').'" class="request-fullscreen" rel="'.($atts['target'] ? $atts['target'] : '#page').'" />';
	}
}
Native_Fullscreen::init();
require_once('widget.php');

?>