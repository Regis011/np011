<?php

/**
 * Enqueue scripts and styles.
 */
function np011_scripts() {

	wp_enqueue_style( 'np011-style', get_stylesheet_directory_uri() . '/style.min.css', array(), '1.0.0' );

	wp_enqueue_script( 'np011-project', get_template_directory_uri() . '/js/dist/scripts.min.js', array( 'jquery' ), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'np011_scripts' );
