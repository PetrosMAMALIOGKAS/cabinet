<?php

/*
	========================
		    ADMIN PAGE
	========================
*/


function psy_add_admin_page() {
	
  // generate Psychologue admin options page
	add_menu_page( 'Psychologue Theme Options', 'Psychologue', 'manage_options', 'psychologue_options', 'psy_theme_create_page', '', 110 );
  /*
  generate Psychologue admin options sub-page
  In order to not hava a submenu "Psychologue":
  the title must be the same add_menu_page(1st) == add_submenu_page(2nd)
  the slug also must be the same so
  add_menu_page(4th) == add_submenu_page(5th)
  the callback function must be the same
  add_menu_page(5th) == add_submenu_page(6th)
*/


  add_submenu_page( 'psychologue_options', 'Psychologue Theme Options', 'Adress Variables', 'manage_options', 'psychologue_options', 'psy_theme_create_page' );
  add_submenu_page( 'psychologue_options', 'Psychologue Personal information', 'Personal information', 'manage_options', 'psychologue_personnal_information', 'psy_theme_information_page');
  add_submenu_page( 'psychologue_options', 'Psychologue Theme supports options', 'Theme supports', 'manage_options', 'psychologue_theme_supports', 'psy_theme_supports_page');
	add_submenu_page( 'psychologue_options', 'Psychologue CSS Options', 'Custom CSS', 'manage_options', 'psychologue_css', 'psy_theme_settings_page');

  //Activate custom settings
	add_action( 'admin_init', 'psy_custom_settings' );
	
}
add_action( 'admin_menu', 'psy_add_admin_page' );

function psy_custom_settings() {

  // address variables settings
  register_setting( 'psychologue-adresse-group', 'adresse_rue' );
  register_setting( 'psychologue-adresse-group', 'adresse_number' );
  register_setting( 'psychologue-adresse-group', 'adresse_code_postale' );
  register_setting( 'psychologue-adresse-group', 'adresse_ville' );
  register_setting( 'psychologue-adresse-group', 'adresse_digicode' );
  register_setting( 'psychologue-adresse-group', 'adresse_information_supplementaire' );
  register_setting( 'psychologue-adresse-group', 'adresse_etage' );
  register_setting( 'psychologue-adresse-group', 'adresse_appartement' );
  register_setting( 'psychologue-adresse-group', 'adresse_longitude', 'psy_coordones_sanitaze' );  
  register_setting( 'psychologue-adresse-group', 'adresse_latitude', 'psy_coordones_sanitaze'  );
  register_setting( 'psychologue-adresse-group', 'profile_picture' );

  // address section title etc.
  add_settings_section( 'psychologue-adress-options', 'Adress Options', 'psy_adresse_options', 'psychologue_options');

  // Adresse complete
  add_settings_field( 'adresse-rue', 'Rue complet', 'psy_adresse', 'psychologue_options', 'psychologue-adress-options');
  add_settings_field( 'adresse-code-postale', 'Code postale', 'psy_code_postale', 'psychologue_options', 'psychologue-adress-options');
  add_settings_field( 'adresse-ville', 'Ville', 'psy_ville', 'psychologue_options', 'psychologue-adress-options');
  //  Adresse access immeuble
  add_settings_field( 'adresse-access-immeuble', 'Access Imeuble', 'psy_access_immeuble', 'psychologue_options', 'psychologue-adress-options');
  add_settings_field( 'adresse-etage', 'Etage', 'psy_etage', 'psychologue_options', 'psychologue-adress-options');
  add_settings_field( 'adresse-appartement', 'Appartement', 'psy_appartement', 'psychologue_options', 'psychologue-adress-options');
  // Adresse coordonees
  add_settings_field( 'adresse-coodronees', 'Coordinates', 'psy_access_coodronees', 'psychologue_options', 'psychologue-adress-options');
  add_settings_field( 'adresse-profile-picture', 'Profile Picture', 'psy_adresse_profile_picture', 'psychologue_options', 'psychologue-adress-options');

  // theme support variables 
  register_setting( 'psychologue-theme-support', 'support_post_formats' );
	register_setting( 'psychologue-theme-support', 'support_custom_header' );
	register_setting( 'psychologue-theme-support', 'support_custom_background' );
  register_setting( 'psychologue-theme-support', 'support_post_thumbnails' );

  //  theme support section title etc.
  add_settings_section( 'psychologue-theme-support-options', 'Theme Support', 'psy_theme_support_options', 'psychologue_theme_support_options');

  //   theme support  post formats
	add_settings_field( 'support-post-formats', 'Post Formats', 'support_post_formats', 'psychologue_theme_support_options', 'psychologue-theme-support-options' );
  //   theme support  sub menu entrie custom header on Appearance menu
	add_settings_field( 'support-custom-header', 'Custom Header', 'support_custom_header', 'psychologue_theme_support_options', 'psychologue-theme-support-options');
  //   theme support  sub menu entrie custom background on Appearance menu
	add_settings_field( 'support-custom-background', 'Custom Background', 'support_custom_background', 'psychologue_theme_support_options', 'psychologue-theme-support-options' );
  //   theme support  post thumpnails
  add_settings_field( 'support-post-thumbnails', 'Post thumbnails', 'support_post_thumbnails', 'psychologue_theme_support_options', 'psychologue-theme-support-options' );


  // Personnal information variables settings
  register_setting( 'psychologue-personnal-information-group', 'personal_phone_cabinet_fix' );
  register_setting( 'psychologue-personnal-information-group', 'personal_phone_cabinet_portable' );

  //  Personnal information section title etc.
  add_settings_section( 'psychologue-information-options', 'Personnal information set', 'psy_information_options', 'psychologue_personal_options');

  // Adresse complete
  add_settings_field( 'phone-cabinet-fix', 'Phone cabinet fix', 'psy_cabinet_fix', 'psychologue_personal_options', 'psychologue-information-options');
  add_settings_field( 'phone-cabinet-portable', 'Phone cabinet portable', 'psy_cabinet_portable', 'psychologue_personal_options', 'psychologue-information-options');
}

/**
 * Callaback function of add_submenu_page()
 *  Personal information page
 *
 * @return void
 */
function psy_theme_information_page() {
  require_once( get_template_directory() . '/inc/templates/psychologue-admin-information.php' );
}

/**
 * Show the title that  declared on add_settings_section()
 * and the description under section title of the admin option page 
 *
 * @return void : echo the description bellow the title
 */
function psy_information_options() {
  echo '<p>Please add your personnal information</p>';
}

function psy_cabinet_fix() {
  $telephone_cabinet_fix = esc_attr( get_option( 'personal_phone_cabinet_fix' ) );
  

  echo '<input type="text" name="personal_phone_cabinet_fix" value="' . $telephone_cabinet_fix . '" placeholder="Telephone fix" />';
}

function psy_cabinet_portable() {
  $telephone_cabinet_portable = esc_attr( get_option( 'personal_phone_cabinet_portable' ) );
  

  echo '<input type="text" name="personal_phone_cabinet_portable" value="' . $telephone_cabinet_portable . '" placeholder="Telephone Portable" />';
  
}






/**
 * Callaback function of add_submenu_page()
 *  of  General page
 *
 * @return void
 */
function psy_theme_create_page() {
  // function defined  as 5th parametre on add_menu_page()
  // and 6th on add_submenu_page()
  // and will generate our admin options page
  require_once( get_template_directory() . '/inc/templates/psychologue-admin.php' );
}

/**
 * Show the title that  declared on add_settings_section()
 * and the description under section title of the admin option page 
 *
 * @return void : echo the description bellow the title
 */
function psy_adresse_options() {

  echo '<p>Customise your address information</p>';
}

function psy_adresse_profile_picture() {
  $picture = esc_attr( get_option( 'profile_picture' ) );
  if ( empty($picture) ) {
    echo '<input type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
  } else {
    echo '<input type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <input type="button" class="button button-secondary" value="Remove Profile Picture" id="remove-picture">';
  }
  echo '<div class="image-container">
            <div id="profile-picture-preview" class="profile-picture" style="background-image: url(' .  $picture . ');"></div>
          </div>';
	
}

function psy_adresse() {
  $adresse_number = esc_attr( get_option( 'adresse_number' ) );
  $adresse_rue = esc_attr( get_option( 'adresse_rue' ) );
  

  echo '<input type="text" name="adresse_number" value="' . $adresse_number . '" placeholder="Rue number" /> <input type="text" name="adresse_rue" value="' . $adresse_rue . '" placeholder="Rue" />';
}

function psy_code_postale() {
  $adresse_code_postale = esc_attr( get_option( 'adresse_code_postale' ) );

  echo '<input type="text" name="adresse_code_postale" value="' . $adresse_code_postale . '" placeholder="Code postale" />';
}

function psy_ville() {
  $adresse_ville = esc_attr( get_option( 'adresse_ville' ) );

  echo '<input type="text" name="adresse_ville" value="' . $adresse_ville . '" placeholder="Ville" />';
}

function psy_access_immeuble() {
  
  $adresse_digicode = esc_attr( get_option( 'adresse_digicode' ) );
  $adresse_information_supplementaire = esc_attr( get_option( 'adresse_information_supplementaire' ) );

  echo '<div class="options-input-titles-container"><p class="options-input-title">Digicode</p><p class="options-input-title">Extra information</p></div><input type="text" name="adresse_digicode" value="' . $adresse_digicode . '" placeholder="Digicode" /> <input type="text" name="adresse_information_supplementaire" value="' . $adresse_information_supplementaire . '" placeholder="Extra info" />';

}

function psy_etage() {
  $adresse_etage = esc_attr( get_option( 'adresse_etage' ) );

  echo '<input type="text" name="adresse_etage" value="' . $adresse_etage . '" placeholder="Etage" />';
}

function psy_appartement() {
  $adresse_appartement = esc_attr( get_option( 'adresse_appartement' ) );

  echo '<input type="text" name="adresse_appartement" value="' . $adresse_appartement . '" placeholder="Appartement" />';
}

function psy_access_coodronees() {
  $adresse_longitude = esc_attr( get_option( 'adresse_longitude' ) );
  $adresse_latitude = esc_attr( get_option( 'adresse_latitude' ) );

  echo '<input type="text" name="adresse_longitude" value="' . $adresse_longitude . '" placeholder="Longitude" /> <input type="text" name="adresse_latitude" value="' . $adresse_latitude . '" placeholder="Latitude" /> <p>Please enter the coordinates with dot (.) and not with comma (,) example: 45.0015</p>';
}

// 
/**
 * coordones_sanitaze and change , by . which is a very common error
 *
 * @param [String] $input :  a string to sanitize
 * @return [String]       :  the sanitised string
 */
function psy_coordones_sanitaze( $input ) {
  $output = sanitize_text_field( $input );
  $output = str_replace(',', '.', $output);

  return $output;
}


/**
 * Callaback function of add_submenu_page()
 * of Theme support page
 *
 * @return void
 */
function psy_theme_supports_page() {
  require_once( get_template_directory() . '/inc/templates/psychologue-admim-theme-support.php' );
}

/**
 * Show the title that  declared on add_settings_section()
 * and the escription under section title of the admin option page 
 *
 * @return void : echo the description bellow the title
 */
function psy_theme_support_options() {
  echo "<p>All the available theme support choises</p>";
}

function support_post_formats() {
  $options = get_option( 'support_post_formats' );
	$formats = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' );
	$output = '';
	foreach ( $formats as $format ){
		$checked = ( @$options[$format] == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="support_post_formats['.$format.']" value="1" '.$checked.' /> '.$format.'</label><br>';
	}
	echo $output;
}

function support_custom_header() {
  $options = get_option( 'support_custom_header' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_header" name="support_custom_header" value="1" '.$checked.' />     Activate the Custom Header</label>';
}

function support_custom_background() {
  $options = get_option( 'support_custom_background' );
	$checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_background" name="support_custom_background" value="1" '.$checked.' /> Activate the Custom Background</label>';
}

function support_post_thumbnails() {
  $options = get_option( 'support_post_thumbnails' );
  $checked = ( @$options == 1 ? 'checked' : '' );
	echo '<label><input type="checkbox" id="custom_post_thumbnails" name="support_post_thumbnails" value="1" '.$checked.' /> Activate the Post Thumbnails</label>';
}





// function psy_adresse_number() {
//   $adresse_number = esc_attr( get_option( 'adresse_number' ) );
//   echo ';
// }

/**
 * Callaback function of add_submenu_page() of
 *  Psychologue CSS Options page
 *
 * @return void
 */
function psy_theme_settings_page() {
  echo '<h3>hello world!! CSS PAGE</h3>';
}