<?php

/*************************************************************
 *         Create Slider Elements custom post type
 *************************************************************/
function psy_create_slider_custom_posttype() {
  $args = array(
    'public' => false,
    'show_ui' => true,
    'menu_icon' => 'dashicons-images-alt',
    'capability_type' => 'page',
    'rewrite' => array( 'slider-loc', 'post_tag' ),
    'label'  => 'Slider Elements',
    'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes')
  );
  register_post_type( 'slider', $args );
}

add_action( 'init', 'psy_create_slider_custom_posttype' );

/*************************************************************
 *         Create Sevices custom post type
 *************************************************************/
function psy_create_services_custom_posttype() {

  $args = array(
    'public' => false,
    'show_ui' => true,
    'menu_icon' => 'dashicons-universal-access-alt',
    'capability_type' => 'post',
    'rewrite' => array( 'slug' => 'service',
                        'with_front' => false ),
    'label'  => 'Services',
    'supports' => array( 'title', 'editor', 'custom-fields', 'thumbnail', 'page-attributes')
  );
  register_post_type( 'service', $args );
}
add_action( 'init', 'psy_create_services_custom_posttype' );


// function psy_create_flight_custom_posttype() {

//   $args = array(
//     'public' => true,
//     'show_ui' => true,
//     'menu_icon' => 'dashicons-universal-access-alt',
//     'capability_type' => 'post',
//     'rewrite' => array( 'slug' => 'flight',
//                         'with_front' => false ),
//     'label'  => 'Flights',
//   );
//   register_post_type( 'flight', $args );
// }
// add_action( 'init', 'psy_create_flight_custom_posttype' );

/** 
 *    Create Custom post type Personne
 */
function psy_create_question_custom_posttype() {

  $args = array(
      'public' => false,
      'show_ui' => true,
      'menu_icon' => 'dashicons-format-chat',
      'capability_type' => 'post',
      'rewrite' => array( 'slug' => 'question',
                          'with_front' => false ),
      'label'  => 'Questions',
      'supports' => array( 'title', 'custom-fields', 'thumbnail', 'page-attributes' ),
			'show_in_rest' => true, // Disponible dans l'API
      'rest_base'	 => 'questions', // Au pluriel
  );
  register_post_type( 'question', $args );
}
add_action( 'init', 'psy_create_question_custom_posttype' );

/** 
 *    Create Custom post type Personne
 */
function psy_create_rendez_vous_custom_posttype() {

  $args = array(
      'public' => false,
      'show_ui' => true,
      'menu_icon' => 'dashicons-calendar-alt',
      'capability_type' => 'post',
      'rewrite' => array( 'slug' => 'rendez-vous',
                          'with_front' => false ),
      'label'  => 'Rendez-vous',
      'supports' => array( 'title', 'custom-fields', 'thumbnail', 'page-attributes' ),
			'show_in_rest' => true, // Disponible dans l'API
      'rest_base'	 => 'rendezvous', // Au pluriel
  );
  register_post_type( 'rendez_vous', $args );
}
add_action( 'init', 'psy_create_rendez_vous_custom_posttype' );

