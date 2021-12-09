<?php

function psy_loadmore_ajax_handler() {
  
  if ( ! empty( $_POST["categorie"] ) ) {
    $categorie_id = $_POST['categorie'];
  }
  
  $author_id = get_the_author_meta( 'ID' );
  $default_posts_per_page = get_option( 'posts_per_page' );
  

  $args = array(
    'post_type' => 'post',
    'cat' => $category_id,
    'posts_per_page' => $default_posts_per_page,
    'paged' => $_POST['page'] + 1,
    'post_status' => 'publish'
  );

  $new_query = new WP_Query( $args );

	if( $new_query->have_posts() ) :
		while( $new_query->have_posts() ): $new_query->the_post();
		  get_template_part( 'parts/ajax', get_post_format() );
		endwhile;
	endif;
  
  wp_reset_postdata();
}
add_action('wp_ajax_loadmore', 'psy_loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'psy_loadmore_ajax_handler'); // wp_ajax_nopriv_{action}
