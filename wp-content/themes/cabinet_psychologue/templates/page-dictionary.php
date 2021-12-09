<?php
/* Template Name: Dictionary Template */ 

$oath_token = '34c432f1eb3e9875e2e7499ae807ae01';

$results =  wp_remote_retrieve_body( wp_remote_get( 'https://api.travelpayouts.com/v2/prices/latest?currency=usd&period_type=year&page=1&limit=10&show_to_affiliates=true&sorting=price&trip_class=0&token=34c432f1eb3e9875e2e7499ae807ae01') );

$results = json_decode( $results );
$results = $results->data;

foreach ($results as $flight) {

  
  $flight_slug = sanitize_title( $flight->origin . '-' . $flight->destination . '-found-' . $flight->found_at );

  var_dump($flight_slug);
}

// echo '<pre>';

// var_dump($results);

// echo '</pre>';



