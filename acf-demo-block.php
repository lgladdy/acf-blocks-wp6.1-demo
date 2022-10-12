<?php
/*
Plugin Name: ACF WordPress 6.1 Demo Block
Description: A standalone distributable ACF 6.0 block that shows off WP 6.1 features.
Version: 1.0
Author: Liam Gladdy
*/

// We register the block on init, earlier than acf/init, so we can make sure we ask ACF to load this block's fields.
add_action( 'init', 'register_acf_block', 5 );
function register_acf_block() {
	register_block_type( __DIR__ );
}

// Register our block's fields into ACF.
add_action(
	'acf/include_fields',
	function() {
		$path                     = __DIR__ . '/acf-fields.json';
		$field_json               = json_decode( file_get_contents( $path ), true );
		$field_json['location']   = array(
			array(
				array(
					'param'    => 'block',
					'operator' => '==',
					'value'    => 'acf/demo',
				),
			),
		);
		$field_json['local']      = 'json';
		$field_json['local_file'] = $path;
		acf_add_local_field_group( $field_json );
	}
);
