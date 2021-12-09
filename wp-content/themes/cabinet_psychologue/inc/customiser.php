<?php

/******************************************************************
 *     Customiser    declarations
 ***************************************************************/
function psy_customise_register( $wp_customise ) {
  // Add a Banner Section to the customizer
  $wp_customise->add_section( 'banner',
                              array(
                                'title'       => __( 'Banner', 'psychology'),
                                'description' => sprintf( __( 'Options for Homepage banner after cv section', 'business' ) ),
                                'priority'    => 130
                                )
                            );

  /*****************************************************
  *   Heading setting   must be here in order to be shown
  ********************************************************/
  $wp_customise->add_setting( 'banner_heading',
                              array(
                                'default' => _x( 'Theraphy with Rania Panousi', 'psychology'),
                                'type'    => 'theme_mod'
                              )
                            );

  //   Heading Control
  $wp_customise->add_control( 'banner_heading',
                              array(
                                  'label'    => __( 'Heading', 'psychology'),
                                  'section'  => 'banner',
                                  'priority' => 20
                              )
                            );
  /*****************************************************
  *   subheading  setting   must be here in order to be shown
  ********************************************************/
  $wp_customise->add_setting( 'banner_subheading',
                              array(
                                  'default' => _x( 'Lorem ipsum dolor sit amet, consectetur a', 'psychology'),
                                  'type'    => 'theme_mod'
                              )
                            );
  //   subheading Control
  $wp_customise->add_control( 'banner_subheading',
                              array(
                                'label'    => __( 'SubHeading', 'psychology'),
                                'section'  => 'banner',
                                'priority' => 25
                              )
                            );

  /*****************************************************
  *   text setting   must be here in order to be shown
  ********************************************************/
  $wp_customise->add_setting( 'banner_text',
                              array(
                                  'default' => _x( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem maiores,
                                                    suscipit quod sed in voluptatem fuga laboriosam doloribus placeat nam
                                                    corporis officiis eum porro quisquam dolores repudiandae optio, id.
                                                    Consequuntur eos animi eius, natus amet pariatur mollitia tempora eligendi
                                                    dolor doloremque vero maxime tempore iure, explicabo consectetur neque
                                                    laborum illum.', 'psychology'),
                                  'type'    => 'theme_mod'
                              )
                            );

  //   text Control
  $wp_customise->add_control( 'banner_text',
                              array(
                                'label'    => __( 'Text', 'psychology'),
                                'section'  => 'banner',
                                'priority' => 30
                              )
                            );
  /*****************************************************
  *   button text setting   must be here in order to be shown
  ********************************************************/
  $wp_customise->add_setting( 'banner_btn_text',
                              array(
                                'default' => _x( 'Consultation Gratuite via Skype', 'psychology'),
                                'type'    => 'theme_mod'
                              )
                            );
   //   button text  Control
  $wp_customise->add_control( 'banner_btn_text',
                              array(
                                'label'    => __( 'Button Text', 'psychology'),
                                'section'  => 'banner',
                                'priority' => 40
                              )
                            );

  /*****************************************************
  *   button url setting   must be here in order to be shown
  ********************************************************/
  $wp_customise->add_setting( 'banner_btn_url',
                              array(
                                'default' => _x( 'https://www.paokmania.gr/', 'psychology'),
                                'type'    => 'theme_mod'
                              )
                            );
  //  button url Control
  $wp_customise->add_control( 'banner_btn_url', array(
                                                    'label'    => __( 'Button URL', 'psychology'),
                                                    'section'  => 'banner',
                                                    'priority' => 40
                                ));

  /*****************************************************
  *   Background image setting   must be here in order to be shown
  ********************************************************/
  $wp_customise->add_setting( 'banner_image',
                                array(
                                  'default' => get_bloginfo( 'template_directory' ) . '/images/therapy-01.png',
                                  'type'    => 'theme_mod'
                                )
                              );
  //   Background image Control
  $wp_customise->add_control( new WP_Customize_Image_Control( $wp_customise,
                                                              'banner_image',
                                                              array(
                                                                'label'    => __( 'Background Image', 'psychology' ),
                                                                'section'  => 'banner',
                                                                'settings' => 'banner_image'
                                                              )
                                                            ));

}

add_action( 'customize_register', 'psy_customise_register' );
