<?php

/*
@package cabinet psychologue
	
	========================
		THEME SUPPORT OPTIONS
	========================
*/


$options = get_option( 'support_post_formats' );
$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
$output = array();
foreach ( $formats as $format ){
	$output[] = ( @$options[$format] == 1 ? $format : '' );
}
if( !empty( $options ) ){
	add_theme_support( 'post-formats', $output );
}

$header = get_option( 'support_custom_header' );
if( @$header == 1 ){
	add_theme_support( 'custom-header' );
}

$background = get_option( 'support_custom_background' );
if( @$background == 1 ){
	add_theme_support( 'custom-background' );
}

$post_thumbnails = get_option( 'support_post_thumbnails' );
if( @$post_thumbnails == 1 ){
	add_theme_support( 'post-thumbnails' );
}