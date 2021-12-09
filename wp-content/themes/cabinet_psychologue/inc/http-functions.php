<?php

add_action( 'wp_ajax_nopriv_psy_get_flights_from_api', 'psy_get_flights_from_api' );
add_action( 'wp_ajax_psy_get_flights_from_api', 'psy_get_flights_from_api' );

function psy_get_flights_from_api() {

  $current_page = ( ! empty(($_POST['current_page'])) ) ? $_POST['current_page'] : 1;

  

  $api_oauth_token = '34c432f1eb3e9875e2e7499ae807ae01';
  // $origin_airport = 'SKG';
  // $destination_airport = 'CDG';
  // $result_curency = 'EUR';
  // $depart_date = '2021-10';
  // $return_date = '2021-11';

  //  On peux passer aussi des custom parametres dans la requête comme $current_page
  $results = wp_remote_retrieve_body( wp_remote_get( 'https://api.travelpayouts.com/v2/prices/latest?currency=eur&period_type=year&page=' . $current_page . '&limit=10&show_to_affiliates=true&sorting=price&trip_class=0&token=' . $api_oauth_token ) );


  // $file = THEME_FOLDER . '/report.txt';
  // $current_page_string =  "Current Page: " . $current_page . "\n\n";
  // file_put_contents ( $file, $current_page_string, FILE_APPEND );

  $results = json_decode( $results );
  $results = $results->data;

  $flights_cf_keys = [];
  // Key = acf key  and value = json object key 
  $flights_cf_keys['field_6139faf71ad05'] = 'origin';
  $flights_cf_keys['field_6139fb1d1ad06'] = 'destination';
  $flights_cf_keys['field_6139fbb21ad07'] = 'gate';
  $flights_cf_keys['field_6139fbbd1ad08'] = 'depart_date';
  
  if ( ! is_array( $results ) || empty( $results ) ) {
    return false;
  }

  foreach ( $results as $flight ) {
    $flight_slug = sanitize_title( $flight->origin . '-' . $flight->destination . '-found-' . $flight->found_at );

    $inserted_flight = wp_insert_post([
      'post_name' => $flight_slug,
      'post_title' => $flight_slug,
      'post_content' => $flight_slug . '  petro Magka',
      'post_type' => 'flight',
      'post_status' => 'publish',
    ]);

    if ( is_wp_error( $inserted_flight ) ) {
      continue;
    }

    foreach ( $flights_cf_keys as $key => $name) {
      update_field( $key, $flight->$name, $inserted_flight );
    }
  }

  $current_page = $current_page + 1;

  wp_remote_post( admin_url( 'admin-ajax.php?action=psy_get_flights_from_api' ), [
    'blocking' => false,
    'sslverify' => false,
    'body' => [
      'current_page' => $current_page
    ]
  ] );
}

