<?php

function psy_question_form_traitement() {
	if ( ! isset( $_POST['question_form_envoi'] ) || ! isset( $_POST['nonce_question'] ) )  {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['nonce_question'], 'submit_question_form' ) ) {
		return;
	}

  $question_name = $_POST['question_name'];
  $question_email = $_POST['question_email'];
  $question_message = $_POST['question_message'];
	//$url = wp_get_referer();
	$url = get_site_url(); 

  update_option( 'question_name', $question_name );
  update_option( 'question_email', $question_email );
  update_option( 'question_message', $question_message );

	// Donation amount is too low.
	// if ( $don < 0 ) {
	// 	$url = add_query_arg( 'erreur', 'radin', wp_get_referer() );

	// Donation amount is too high.
	// } elseif ( $don > 10000 ) {
	// 	$url = add_query_arg( 'erreur', 'trop', wp_get_referer() );

	// Everything's OK, let's do the work...
	// } else {
	// 	$cagnotte_actuelle = intval( get_option( 'valeur_cagnotte', 0 ) );
	// 	update_option( 'valeur_cagnotte', $cagnotte_actuelle + $don );
	// 	$url = add_query_arg( 'success', 1, wp_get_referer() );
	// }
  

  $random_number = rand(0, 1000000);
  $post_title = 'question-patient-id_' . $random_number;
  
    $new_post_args = array(
      'ID' => '',
      'post_author' => 1, 
      'post_title' => $post_title,
      'post_type' => 'question',
      'post_status' => 'publish'
    );
  
    $the_post_id = wp_insert_post( $new_post_args );


		if ($the_post_id == 0 ) { // error
			$url .=  '/error';
		} else { // success
			$url .= '/thank-you';
		}

		$url = add_query_arg( 'source', 'question', $url  );

  


		// insert acf data of the form in the new created post if not in a group field
	
					update_field( 'field_6194e61c69fda', $question_name, $the_post_id );
					update_field( 'field_6194e63269fdb', $question_email, $the_post_id );
					update_field( 'field_6194e64769fdc', $question_message, $the_post_id );
		

			/*  <emailing> */	

		// $headers = array( 'Content-Type: text/html; charset=UTF-8' );
		// $reposne_mail = wp_mail( 'liogas77@windowslive.com', $post_title, 'pppppp', $headers );
		// update_option( 'email_send', $reposne_mail );

		  /*  </emailing> */	

	// Redirect user back to the form, with a source marker in $_GET.
	wp_safe_redirect( $url );
	exit();
}
add_action( 'template_redirect', 'psy_question_form_traitement' );



// question error handling
if ( isset( $_GET['question-erreur'] ) ) {
	$error = sanitize_title( $_GET['question-erreur'] );

	// switch ( $error ) {
	// 	case 'radin' :
	// 		$message = __( 'We need a positive amount.', 'msk' );
	// 		break;

	// 	case 'trop' :
	// 		$message = __( 'Thanks, but we do not need that much money.', 'msk' );
	// 		break;

	// 	default :
	// 		$message = __( 'Something went wrong.', 'msk' );
	// 		break;
	// }
	if ($error) {
		$message = __( 'We need a positive amount.', 'msk' );
	}

	printf( '<div class="error"><p>%1$s</p></div>', esc_html( $message ) );
}

/************************************************** */
function psy_rendez_vous_form_traitement() {
	if ( ! isset( $_POST['rendez_vous_form_envoi'] ) || ! isset( $_POST['nonce_rendez_vous'] ) )  {
		return;
	}

	if ( ! wp_verify_nonce( $_POST['nonce_rendez_vous'], 'submit_rendez_vous_form' ) ) {
		return;
	}

	$rendez_vous_name = $_POST['rendez_vous_name'];
  $rendez_vous_email = $_POST['rendez_vous_email'];
  $rendez_vous_phone = $_POST['rendez_vous_phone'];
	$rendez_vous_date = $_POST['rendez_vous_date'];
  $rendez_vous_age = $_POST['rendez_vous_age'];
  $rendez_vous_reason = $_POST['rendez_vous_reason'];
  $rendez_vous_message = $_POST['rendez_vous_message'];

	
	$random_number = rand(0, 1000000);
  $rendez_vous_post_title = 'rendez-vous-patient-id_' . $random_number;
  
	$new_post_args = array(
		'ID' => '',
		'post_author' => 1, 
		'post_title' => $rendez_vous_post_title,
		'post_type' => 'rendez_vous',
		'post_status' => 'publish'
	);
  
  $the_post_id = wp_insert_post( $new_post_args );


	update_field( 'field_61a8cd79ad6ba', $rendez_vous_name, $the_post_id );
	update_field( 'field_61a8cd87ad6bb', $rendez_vous_email, $the_post_id );
	update_field( 'field_61a8cda6ad6bc', $rendez_vous_phone, $the_post_id );
	update_field( 'field_61a8cdd2ad6bd', $rendez_vous_date, $the_post_id );
	update_field( 'field_61a8ce17ad6be', $rendez_vous_age, $the_post_id );
	update_field( 'field_61a8cf3cad6bf', $rendez_vous_reason, $the_post_id );
	update_field( 'field_61a8cfa7ad6c0', $rendez_vous_message, $the_post_id );

	
	$url = get_site_url() . '/rendez-vous/';
	//$url = wp_get_referer();

	$result = '';
	if ($the_post_id == 0 ) { // error
		$result =  'error';
	} else { // success
		$result = 'succes';
	}

	$url = add_query_arg( 'result', $result, $url  );


	wp_safe_redirect( $url );
	exit();

}
add_action( 'template_redirect', 'psy_rendez_vous_form_traitement' );