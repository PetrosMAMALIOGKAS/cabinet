<?php

define( "STYLESHEET_DIRECTORY" , get_stylesheet_directory_uri() );
define( "THEME_FOLDER", WP_CONTENT_DIR . '/themes/cabinet_psychologue' );

// require_once( THEME_FOLDER . '/inc/database-functions.php');

require_once( THEME_FOLDER . '/inc/custom-post-types.php');
require_once( THEME_FOLDER . '/inc/custom-taxonomies.php');
require_once( THEME_FOLDER . '/inc/customiser.php');
require_once( THEME_FOLDER . '/inc/ajax-functions.php');
require_once( THEME_FOLDER . '/inc/http-functions.php');
require_once( THEME_FOLDER . '/inc/forms-functions.php');
require_once( THEME_FOLDER . '/inc/emailing-functions.php');
require_once( THEME_FOLDER . '/inc/admin-functions.php');
require_once( THEME_FOLDER . '/inc/theme-support.php');

/**
 * Site Setup
 *
 * @return void
 */
function psy_psychologue_theme_setup() {
  // add Featured image support
 // add_theme_support('post-thumbnails');

  // add Custom logo support
  add_theme_support('custom-logo');

  // add Menus on the backend
  register_nav_menus(array(
      'primary' => __('Primary Menu'),   //   __() its for translation reasons shown at the backend
      'footer'  => __('Footer Menu')
  ));

  // Add Post format support
 // add_theme_support('post-formats', array( 'aside', 'gallery', 'link' ));
}
add_action('after_setup_theme', 'psy_psychologue_theme_setup');


/**
 * Custom Logo Declaration
 *
 * @return void
 */
// function psy_custom_logo_setup()
// {
//   $defaults = array(
//     'height'               => 100,
//     'width'                => 400,
//     'flex-height'          => true,
//     'flex-width'           => true,
//     'header-text'          => array( 'site-title', 'site-description' ),
//     'unlink-homepage-logo' => true,
//   );
//
//   add_theme_support( 'custom-logo', $defaults );
// }
//
// add_action( 'after_setup_theme', 'psy_custom_logo_setup' );



/**
 * Widjets activation
 *
 * @return void
 */
function psy_init_widgets() {
    register_sidebar(array(
        'name'          => __('Sidebar categories', 'textdomain'),
        'id'            => 'sidebar_categories',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<div class="widget-categories widget">',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name'          => __('Sidebar latest posts', 'textdomain'),
        'id'            => 'sidebar_latest_posts',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<div class="widget-latest-post widget">',
        'after_widget'  => '</div>',
    ));

    register_sidebar(array(
        'name'          => __('Footer_top', 'textdomain'),
        'id'            => 'footer_top',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '',
        'after_widget'  => '',
        // 'before_title'  => '<h3 class="widget-title">',
        // 'after_title'   => '</h3>'
    ));

    register_sidebar(array(
        'name'          => __('Presentation', 'textdomain'),
        'id'            => 'presentation',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '<div class="presentation-psychologue">
                              <div class="container row">',
        'after_widget'  => '  </div>
                            </div>'
    ));

    register_sidebar(array(
        'name'          => __('About', 'textdomain'),
        'id'            => 'about',
        'description'   => __('Widgets in this area will be shown on all posts and pages.', 'textdomain'),
        'before_widget' => '',
        'after_widget'  => ''
    ));
}

add_action('widgets_init', 'psy_init_widgets');


/**
 * Register jquery flexslider
 *
 * @return void
 */
function psy_register_my_scripts() {
  wp_register_script( 'flexslider', get_stylesheet_directory_uri() . '/flexslider/jquery.flexslider-min.js', array('jquery'), '1.0.0', true );
}
add_action('init', 'psy_register_my_scripts');


/**
 * Loading js files
 *
 * @return void
 */
function psy_load_js_assets() {
  wp_enqueue_script('jquery-core',  '/wp-includes/js/jquery/jquery.js');
  wp_enqueue_script('flexslider',  get_stylesheet_directory_uri() . '/flexslider/jquery.flexslider-min.js');
  wp_enqueue_script('js-script-file', get_template_directory_uri() . '/js/script.js', array(), date("h:i:s") );
  wp_enqueue_script('accordion-script-file', get_template_directory_uri() . '/js/accordion-script.js', array(), date("h:i:s"));

  if ( is_page( 'contact' ) || is_page( 'rendez-vous' ) ) {
    // wp_enqueue_script('leaflet-script-file', get_template_directory_uri() . '/js/leaflet.js', array(), date("h:i:s"));

    // wp_script_add_data( 'leaflet-script-file', 'crossorigin', '' );

    wp_enqueue_script('map-script-file', get_template_directory_uri() . '/js/map-script.js', array(), date("h:i:s"), true);
  }

  // Ajax assets loading
  if ( is_archive() || is_search() )  {

    wp_register_script( 'loadmore-ajax-js', get_bloginfo('template_url') . '/js/ajax-script.js', array( 'jquery-core' ), '', true);
    wp_localize_script( 'loadmore-ajax-js', 'ajax_functions_params', array( 'ajaxurl' => admin_url('admin-ajax.php' )));

    wp_enqueue_script('loadmore-ajax-js');
  }

}
add_action('wp_enqueue_scripts', 'psy_load_js_assets');


/**
 * Loading css files
 *
 * @return void
 */
function psy_load_css_assets() {
  
  if ( is_page( 'services' ) || is_page( 'rendez-vous' ) ) {
    wp_enqueue_style( 
      'service-page-styles', 
      get_bloginfo('template_url') . '/css/service-page-styles.css' 
    );

    // wp_enqueue_style( 
    //   'leaflet-styles', 
    //   get_bloginfo('template_url') . '/css/leaflet.css' 
    // );
  }

  if ( is_page( 'contact' ) ) {
    wp_enqueue_style( 
      'contact-styles', 
      get_bloginfo('template_url') . '/css/contact-page.css' 
    );
  }

  if ( is_page( 'rendez-vous' ) || is_page( 'thank-you' ) || is_page( 'error' )) {
    wp_enqueue_style( 
      'contact-styles', 
      get_bloginfo('template_url') . '/css/rendez-vous-page.css' 
    );
  }
}
add_action( 'wp_enqueue_scripts', 'psy_load_css_assets' );

/**
 * Load the css styles or script for a specific page on back end
 *
 * @param [type] $hook : The current admin page.
 * @return void
 */
function sunset_load_admin_scripts( $hook ){
  // prints the name of the  page juste after body tag
  // echo $hook;
	
	if( 'toplevel_page_psychologue_options' != $hook ){ return; }
	
	wp_register_style( 'psy_admin_styles', get_template_directory_uri() . '/css/psy.admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'psy_admin_styles' );

  // Enqueues all scripts, styles, settings, and templates necessary to use all media JS APIs.
  wp_enqueue_media();

  wp_register_script( 'psy-admin-script', get_template_directory_uri() . '/js/psychologue.admin.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'psy-admin-script' );
}
add_action( 'admin_enqueue_scripts', 'sunset_load_admin_scripts' );


/**
 *   print js script to the footer
 *
 * @return void
 */
function psy_print_my_script_to_footer() {
	global $add_my_script, $ss_atts;
	if ( $add_my_script ) {
		$speed = $ss_atts['slideshowspeed']*1000;
		echo "<script type=\"text/javascript\">
            jQuery(document).ready(function($) {
            	$('head').prepend($('<link>').attr({
            		rel: 'stylesheet',
            		type: 'text/css',
            		media: 'screen',
            		href: '" . get_stylesheet_directory_uri() . "/flexslider/flexslider.css'
            	}));
            	$('.flexslider').flexslider({
            		animation: '".$ss_atts['animation']."',
            		slideshowSpeed: ".$speed.",
            		controlNav: false
            	});
            });
          </script>";
		wp_print_scripts('flexslider');
	} else {
		return;
	}
}
add_action('wp_footer', 'psy_print_my_script_to_footer', 99);


/**
 *  creating a post meta value(url) for each slide
 *
 * @param [type] $post_ID
 * @return void
 */
function psy_set_default_slidermeta($post_ID) {
  add_post_meta($post_ID, 'slider-url', 'http://', true);
  return $post_ID;
}
add_action('wp_insert_post', 'psy_set_default_slidermeta');


/**
 * slider short code definition
 *
 * @param [type] $atts
 * @return void
 */
function simple_slider_shortcode($atts = null) {
 	global $add_my_script, $ss_atts;
 	$add_my_script = true;
 	$ss_atts = shortcode_atts(
 		array(
 			'location' => '',
 			'limit' => -1,
 			'ulid' => 'flexid',
 			'animation' => 'slide',
 			'slideshowspeed' => 5
 		), $atts, 'simpleslider'
 	);
 	$args = array(
 		'post_type' => 'slider',
 		'posts_per_page' => $ss_atts['limit'],
 		'orderby' => 'menu_order',
 		'order' => 'ASC'
 	);
 	if ($ss_atts['location'] != '') {
 		$args['tax_query'] = array(
 			array( 'taxonomy' => 'slider-loc', 'field' => 'slug', 'terms' => $ss_atts['location'] )
 		);
 	}
 	$the_query = new WP_Query( $args );
 	$slides = array();
 	if ( $the_query->have_posts() ) {
 		while ( $the_query->have_posts() ) {
 			$the_query->the_post();
 			$imghtml = get_the_post_thumbnail(get_the_ID(), 'full');
      //   The url of this slider element
 			$url = get_post_meta(get_the_ID(), 'slider-url', true);

 			if ($url != '' && $url != 'http://') {
 				$imghtml = '<a href="'.$url.'">'.$imghtml.'</a>';
 			}
 			$slides[] = '
           				<li>
                    <div class="wrapper-carousel">
             					<div class="slide-media">'.$imghtml.'</div>
             					<div class="slide-content">
             						<h3 class="slide-title">'.get_the_title().'</h3>
             						<div class="slide-text">'.get_the_content().'</div>
                        <div class="button-container">
                          <a href="#" class="button">réserver une session</a>
                        </div>
             					</div>
                    </div>
           				</li>';
 		}
 	}

 	wp_reset_query();

 	return '
         	<div class="flexslider" id="'.$ss_atts['ulid'].'">
         		<ul class="slides">
         			'.implode('', $slides).'
         		</ul>
         	</div>';
}
add_shortcode( 'simpleslider', 'simple_slider_shortcode' );


/** Change excerpt lenght  */
function psy_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'psy_custom_excerpt_length', 999 );


/************************************************************
 *    Remove block editor from widget page to get back the old layout
 ***********************************************************/
// function example_theme_support() {
//     remove_theme_support( 'widgets-block-editor' );
// }
// add_action( 'after_setup_theme', 'example_theme_support' );



/************************************************
 * 
 *      init Cors 
 *   https://linguinecode.com/post/enable-wordpress-rest-api-cors
 ***********************************************/
// function initCors( $value ) {
//   $origin = get_http_origin();
//   $allowed_origins = [ 'https://www.watdev.fr', 'https://unpkg.com', 'localhost:8080' ];

//   if ( $origin && in_array( $origin, $allowed_origins ) ) {
//     header( 'Access-Control-Allow-Origin: ' . esc_url_raw( $origin ) );
//     header( 'Access-Control-Allow-Methods: GET' );
//     header( 'Access-Control-Allow-Credentials: true' );
//   }

//   return $value;
// }

// add_action( 'rest_api_init', function() {

// 	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );

// 	add_filter( 'rest_pre_serve_request', initCors);
// }, 15 );

// function initCors( $value ) {
//   $origin_url = '*';

//   // Check if production environment or not
//   if (ENVIRONMENT === 'production') {
//     $origin_url = 'https://linguinecode.com';
//   }

//   header( 'Access-Control-Allow-Origin: ' . $origin_url );
//   header( 'Access-Control-Allow-Methods: GET' );
//   header( 'Access-Control-Allow-Credentials: true' );
//   return $value;
// }



// function add_cors_http_header(){
//   header("Access-Control-Allow-Origin: *");
// }
// add_action('init','add_cors_http_header');


/**
 * Add specific CSS class by filter.
 *
 * @param [type] $classes
 * @return void
 */
function psy_add_classes_to_body_tag( $classes ) {
  if (is_page( 'contact' )) {
    return array_merge( $classes, array( 'contact-page' ) );
  } else {
    // do nothing
    return array_merge( $classes, array( '' ) );
  }
} 
add_filter( 'body_class', 'psy_add_classes_to_body_tag');


/**
 * Inline script printed out in the footer 
 *   that gives a succes or error message on form submit.
 *
 * @return void
 */
function psy_add_inline_javascript_to_rendezvous_page() {
    global $post;
    $post_slug = get_site_url() . '/' . $post->post_name . '/?result=';
    $form_succes = $post_slug . 'succes';
    $form_error = $post_slug . 'error';
    if (is_page( 'rendez-vous' )) : ?>
      <script>
        var message_tag = document.getElementById('submit-rendez-vous-form-message');
        var current_url = document.location.href;
        if (current_url == "<?php echo $form_succes; ?>") {
          message_tag.innerHTML = "Your rendez vous has been register. We will contact you as soon as possible";
          jQuery( "#submit-rendez-vous-form-message" ).css('color', 'green');
        }

        if (current_url == "<?php echo $form_error; ?>") {
          message_tag.innerHTML = "Error on registering your rendez-vous. Please try again later.";
          jQuery( "#submit-rendez-vous-form-message" ).css('color', 'red');
        }

        setTimeout( function(){ 
            jQuery( "#submit-rendez-vous-form-message" ).fadeOut( "slow" );
          }  , 2000 );

          setTimeout( function(){ 
            jQuery( "#submit-rendez-vous-form-message" ).empty();
            jQuery( "#submit-rendez-vous-form-message" ).css('display', 'inline');
          }  , 3000 );
        

      </script>
    <?php
    endif;
}
add_action('wp_footer', 'psy_add_inline_javascript_to_rendezvous_page');



