<?php
/**
 * Check and setup theme's default settings
 *
 * @package np011
 *
 */

if ( ! function_exists ( 'np011_setup_theme_default_settings' ) ) {
	function np011_setup_theme_default_settings() {

		// check if settings are set, if not set defaults.
		// Caution: DO NOT check existence using === always check with == .
		// Latest blog posts style.
		$np011_posts_index_style = get_theme_mod( 'np011_posts_index_style' );
		if ( '' == $np011_posts_index_style ) {
			set_theme_mod( 'np011_posts_index_style', 'default' );
		}

		// Sidebar position.
		$np011_sidebar_position = get_theme_mod( 'np011_sidebar_position' );
		if ( '' == $np011_sidebar_position ) {
			set_theme_mod( 'np011_sidebar_position', 'right' );
		}

		// Container width.
		$np011_container_type = get_theme_mod( 'np011_container_type' );
		if ( '' == $np011_container_type ) {
			set_theme_mod( 'np011_container_type', 'container' );
		}
	}
}