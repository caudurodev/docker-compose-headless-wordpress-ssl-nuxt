<?php
// Requires some persistent object cache such as wp-redis.
define( 'WP_GRAPHQL_CACHE_AGE', 60*60 ); // default in seconds

add_action( 'do_graphql_request', function () {

	if ( ! isset( $_SERVER['HTTP_X_GRAPHQL_CACHE'] ) ) {
		return;
	}

  $key = $_SERVER['HTTP_X_GRAPHQL_CACHE'];
  $data = wp_cache_get( $key, 'wpgraphql' );

  if ( $data ) {
		header( 'Content-Type: application/json' );
		header( 'x-graphql-cache-status: hit' );

    	echo $data;
		die();
	}
	header( 'x-graphql-cache-status: miss' );

} );

add_action( 'graphql_return_response', function( $res ) {
	if ( ! isset( $_SERVER['HTTP_X_GRAPHQL_CACHE'] ) ) {
		return;
	}
	$key      = $_SERVER['HTTP_X_GRAPHQL_CACHE'];

	$duration = $_SERVER['HTTP_X_GRAPHQL_CACHE_DURATION'];
	if( $duration ){
		$cacheTime = $duration;
	} else {
		$cacheTime =  WP_GRAPHQL_CACHE_AGE;
	}
	
	wp_cache_add( $key, wp_json_encode( $res->toArray() ), 'wpgraphql', $cacheTime);
} );
?>
