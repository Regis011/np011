<?php
/**
 * np011 enqueue scripts
 *
 * @package np011
 */

if ( ! function_exists( 'np011_scripts' ) ) {
	/**
	 * Load theme's JavaScript sources.
	 */
	function np011_scripts() {
		// Get the theme data.
		$the_theme = wp_get_theme();
		wp_enqueue_style( 'np011-styles', get_stylesheet_directory_uri() . '/assets/css/style.css', false, null );
		wp_enqueue_script( 'np011-scripts', get_template_directory_uri() . '/js/build.js', ['jquery'], null, true );
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'np011_scripts' );
