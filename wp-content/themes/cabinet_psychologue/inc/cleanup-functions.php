<?php
/*
====================================
  Remove generator version function
====================================

must be included before css and script loading
on header and footer

*/


/**
 * remove version string from js and css 
 *
 * @param [String] $src Variable that passed from the filter that call this function
 * @return [String]  sring without the WordPress version
 */
function psy_remove_wp_version_strings( $src ) {
	
	global $wp_version;
	parse_str( parse_url($src, PHP_URL_QUERY), $query );
	if ( !empty( $query['ver'] ) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
	
}
add_filter( 'script_loader_src', 'psy_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'psy_remove_wp_version_strings' );


/**
 * remove metatag generator from header 
 *
 * @return void
 */
function psy_remove_meta_version() {
	return '';
}
add_filter( 'the_generator', 'psy_remove_meta_version' );
