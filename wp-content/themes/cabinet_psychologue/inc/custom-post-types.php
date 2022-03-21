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




/*	
    ======================================================
    TEST CUSTOM POST TYPES WITH CUSTOM COLUMNS WITHOUT ACF
    ======================================================
*/

//$contact = get_option( 'activate_contact' );
$contact = 1;
if( @$contact == 1 ){

  add_action( 'init', 'sunset_contact_custom_post_type' );

  add_filter( 'manage_test-cpt_posts_columns', 'sunset_set_contact_columns' );
  add_action( 'manage_test-cpt_posts_custom_column', 'sunset_contact_custom_column', 10, 2 );

  // custom meta boxes (fields)
  add_action( 'add_meta_boxes', 'sunset_contact_add_meta_box' );
	add_action( 'save_post', 'sunset_save_contact_email_data' );
}

/* CONTACT CPT */
function sunset_contact_custom_post_type() {
  $labels = array(
  'name' 			    	=> 'Test cpt',
  'singular_name' 	=> 'Test cpt',
  'menu_name'		  	=> 'Test CPT',
  'name_admin_bar'	=> 'Test CPT'
  );

  $args = array(
  'labels'			=> $labels,
  'show_ui'			=> true,
  'show_in_menu'		=> true,
  'capability_type'	=> 'post',
  'hierarchical'		=> false,
  'menu_position'		=> 26,
  'menu_icon'			=> 'dashicons-email-alt',
  'supports'			=> array( 'title', 'editor', 'author' )
  );

  register_post_type( 'test-cpt', $args );

}

function sunset_set_contact_columns( $columns ){
  $newColumns = array();
	$newColumns['title'] = 'Full Name';
	$newColumns['message'] = 'Message';
	$newColumns['email'] = 'Email';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function sunset_contact_custom_column( $column, $post_id ){

  switch( $column ){

  case 'message' :
    echo get_the_excerpt();
    break;
    
  case 'email' :
    //email column
    $email = get_post_meta( $post_id, '_contact_email_value_key', true );
    echo '<a href="mailto:'.$email.'">'.$email.'</a>';
    break;
  }

}

/* CONTACT META BOXES */

function sunset_contact_add_meta_box() {
	add_meta_box( 'contact_email', 'User Email', 'sunset_contact_email_callback', 'test-cpt', 'normal' );
}

function sunset_contact_email_callback( $post ) {
	wp_nonce_field( 'sunset_save_contact_email_data', 'sunset_contact_email_meta_box_nonce' );
	
	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );
	
	echo '<label for="sunset_contact_email_field">User Email Address: </lable>';
	echo '<input type="email" id="sunset_contact_email_field" name="sunset_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}


function sunset_save_contact_email_data( $post_id ) {
	
	if( ! isset( $_POST['sunset_contact_email_meta_box_nonce'] ) ){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['sunset_contact_email_meta_box_nonce'], 'sunset_save_contact_email_data') ) {
		return;
	}
	
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
		return;
	}
	
	if( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	
	if( ! isset( $_POST['sunset_contact_email_field'] ) ) {
		return;
	}
	
	$my_data = sanitize_text_field( $_POST['sunset_contact_email_field'] );
	
	update_post_meta( $post_id, '_contact_email_value_key', $my_data );
	
}


