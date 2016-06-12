<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package np011
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function np011_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'np011_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function np011_jetpack_setup
add_action( 'after_setup_theme', 'np011_jetpack_setup' );

function np011_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function np011_infinite_scroll_render