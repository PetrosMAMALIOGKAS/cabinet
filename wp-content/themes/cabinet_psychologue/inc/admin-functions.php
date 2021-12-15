<?php

/*
	
	========================
		ADMIN PAGE
	========================

*/


function psy_add_admin_page() {
	
  // generate Psychologue admin options page
	add_menu_page( 'Psychologue Theme Options', 'Psychologue', 'manage_options', 'psychologue_options', 'psy_theme_create_page', '', 110 );

  // generate Psychologue admin options sub-page
  // In order to not hava a submenu "Psychologue":
  // the title must be the same add_menu_page(1st) == add_submenu_page(2nd)
  // the slug also must be the same so
  // add_menu_page(4th) == add_submenu_page(5th)
  // the callback function must be the same
  // add_menu_page(5th) == add_submenu_page(6th)

  add_submenu_page( 'psychologue_options', 'Psychologue Theme Options', 'General', 'manage_options', 'psychologue_options', 'psy_theme_create_page' );
	add_submenu_page( 'psychologue_options', 'Psychologue CSS Options', 'Custom CSS', 'manage_options', 'psychologue_css', 'psy_theme_settings_page');

  //Activate custom settings
	add_action( 'admin_init', 'psy_custom_settings' );
	
}
add_action( 'admin_menu', 'psy_add_admin_page' );

function psy_custom_settings() {
  register_setting( 'psychologue-settings-group', 'adresse_rue' );
  add_settings_section( 'psychologue-adress-options', 'Adress Options', 'psy_adresse_options', 'psychologue_options');
  add_settings_field( 'adresse-rue', 'Rue', 'psy_adresse_rue', 'psychologue_options', 'psychologue-adress-options');
  /*  testingggg  */
  register_setting( 'psychologue-settings-group', 'adresse_number' );
  add_settings_field( 'adresse-number', 'Rue number', 'psy_adresse_number', 'psychologue_options', 'psychologue-adress-options');
  
}

function psy_theme_create_page() {
  // function defined  as 5th parametre on add_menu_page()
  // and 6th on add_submenu_page()
  // and will generate our admin options page
  require_once( get_template_directory() . '/inc/templates/psychologue-admin.php' );
}

function psy_adresse_options() {
  echo '<p>Customise your adress information</p>';
}

function psy_adresse_rue() {
  $adresse_rue = esc_attr( get_option( 'adresse_rue' ) );
  echo '<input type="text" name="adresse_rue" value="' . $adresse_rue . '" placeholder="Rue" />';
}

function psy_adresse_number() {
  $adresse_number = esc_attr( get_option( 'adresse_number' ) );
  echo '<input type="text" name="adresse_number" value="' . $adresse_number . '" placeholder="Rue number" />';
}

function psy_theme_settings_page() {
  echo '<h3>hello world!! CSS PAGE</h3>';
}

