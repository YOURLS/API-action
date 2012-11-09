<?php
/*
Plugin Name: Custom API action
Plugin URI: http://yourls.org/
Description: Define custom API action 'delete'
Version: 1.0
Author: Ozh
Author URI: http://ozh.org/
*/

// Define custom action "delete"
yourls_add_filter( 'api_action_delete', 'my_delete_function' );

// Actually delete
function my_delete_function() {
	// Need 'shorturl' parameter
	if( !isset( $_REQUEST['shorturl'] ) ) {
		return array(
			'statusCode' => 400,
			'simple'     => "Need a 'shorturl' parameter",
			'message'    => 'error: missing param',
		);	
	}
	
	$shorturl = $_REQUEST['shorturl'];

	// Check if valid shorturl
	if( !yourls_is_shorturl( $shorturl ) ) {
		return array(
			'statusCode' => 404,
			'simple '    => 'Error: short URL not found',
			'message'    => 'error: not found',
		);	
	}
	
	// Delete shorturl
	if( yourls_delete_link_by_keyword( $shorturl ) ) {
		return array(
			'statusCode' => 200,
			'simple'     => "Shorturl $shorturl deleted",
			'message'    => 'success: deleted',
		);	
	} else {
		return array(
			'statusCode' => 500,
			'simple'     => 'Error: could not delete shorturl, not sure why :-/',
			'message'    => 'error: unknown error',
		);	
	}
}
