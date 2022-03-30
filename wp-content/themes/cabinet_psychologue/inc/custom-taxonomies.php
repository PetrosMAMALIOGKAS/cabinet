<?php

/**
 * Create CPT slider taxonony
 *
 * @return void
 */
function psy_create_slider_location_taxonomy()
{
	register_taxonomy(
		// taxonomy
		'slider-loc',
		//  object_type
		'slider',
		array(
			'label' => 'Slider location',
			'public' => false,
			'show_ui' => true,
			'show_admin_column' => true,
			'rewrite' => false
		)
	);
}

add_action( 'init', 'psy_create_slider_location_taxonomy' );



/**
 * Create CPT services taxonony
 *
 * @return void
 */
function psy_create_services_location_taxonomy()
{
	register_taxonomy(
		// taxonomy
		'service-loc',
		//  object_type
		'service',
		array(
			'label' => 'Service location',
			'public' => false,
			'show_ui' => true,
			'show_admin_column' => true,
			'rewrite' => false
		)
	);
}

add_action( 'init', 'psy_create_services_location_taxonomy' );
