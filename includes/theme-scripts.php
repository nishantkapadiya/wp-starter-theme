<?php
/**
* Load the custom scripts and styles.
*/

if ( !defined( 'ABSPATH' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit;
}

/**
 * [action__front_script Function to add script at front side]
 *
 */
function action__front_script() {

    // Register and enqueue scripts js
    wp_register_script( ZWT_THEME_PREFIX . '-slick', get_template_directory_uri() . '/assets/js/slick-1.8.1.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( ZWT_THEME_PREFIX . '-slick' );
    wp_register_script( ZWT_THEME_PREFIX . '-scripts-jquery', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( ZWT_THEME_PREFIX . '-scripts-jquery' );

}
add_action( 'wp_enqueue_scripts', 'action__front_script' );