<?php

if ( !defined( 'WP_DEBUG' ) ) {
	die( 'Direct access forbidden.' );
}

add_action( 'wp_enqueue_scripts', 'eduker_child_enqueue_styles', 99 );

function eduker_child_enqueue_styles() {
   wp_enqueue_style( 'parent-style', get_stylesheet_directory_uri() . '/style.css' );
}