<?php
/*
Plugin Name: WP GRAPHQL REDIS CACHE
Plugin URI: https://cauduro.dev
Description: Makes your Wordpress GraphQL requests faster by caching them from the request
Version: 0.1
Author: cauduro.dev
Author URI: https://cauduro.dev
*/
include( dirname(__FILE__) . '/cache.php');

// Allow custom headers to be accepted by WPGraphQL
function my_graphql_header_function( $headers ) {
    $headers['Access-Control-Allow-Headers']  = $headers['Access-Control-Allow-Headers'] . ', HTTP_X_GRAPHQL_CACHE, HTTP_X_GRAPHQL_CACHE_DURATION';
    return $headers;
}
add_filter( 'graphql_response_headers_to_send', 'my_graphql_header_function' );

// allow CORS in REST API
function add_custom_headers() {

    add_filter( 'rest_pre_serve_request', function( $value ) {
        header( 'Access-Control-Allow-Headers: Authorization, X-WP-Nonce,Content-Type, X-Requested-With');
        header( 'Access-Control-Allow-Origin: *' );
        header( 'Access-Control-Allow-Methods: POST, GET' );
        header( 'Access-Control-Allow-Credentials: true' );

        return $value;
    } );
}
add_action( 'rest_api_init', 'add_custom_headers', 15 );
?>
