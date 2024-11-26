<?php
/**
 * Plugin Name: Custom Latest Posts Block
 * Description: A plugin that registers a custom Gutenberg block to display the latest posts.
 * Version: 1.0.0
 * Author: Rafaa Belhedi
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function clp_register_block_assets() {
	wp_enqueue_script(
		'clp-block-script',
		plugin_dir_url( __FILE__ ) . 'build/index.js',
		array( 'wp-blocks', 'wp-element', 'wp-editor', 'wp-components', 'wp-data', 'wp-api-fetch'),
		filemtime( plugin_dir_path( __FILE__ ) . 'build/index.js' )
	);

//	wp_enqueue_style(
//		'clp-block-editor-style',
//		plugin_dir_url( __FILE__ ) . 'build/editor.css',
//		array( 'wp-edit-blocks' ),
//		filemtime( plugin_dir_path( __FILE__ ) . 'build/editor.css' )
//	);
//
//	wp_enqueue_style(
//		'clp-block-style',
//		plugin_dir_url( __FILE__ ) . 'build/style.css',
//		array(),
//		filemtime( plugin_dir_path( __FILE__ ) . 'build/style.css' )
//	);
}

add_action( 'enqueue_block_editor_assets', 'clp_register_block_assets' );

function clp_register_rest_endpoint() {
	register_rest_route( 'clp/v1', '/latest-posts', array(
		'methods'  => 'GET',
		'callback' => 'clp_get_latest_posts',
	));
}

function clp_get_latest_posts() {
	$posts = get_posts( array(
		'numberposts' => isset( $_GET['count'] ) ? intval( $_GET['count'] ) : 5,
		'post_status' => 'publish',
	));

	$data = array();
	foreach ( $posts as $post ) {
		$data[] = array(
			'title'       => get_the_title( $post ),
			'excerpt'     => get_the_excerpt( $post ),
			'featuredImg' => get_the_post_thumbnail_url( $post ),
		);
	}

	return rest_ensure_response( $data );
}
add_action( 'rest_api_init', 'clp_register_rest_endpoint' );

