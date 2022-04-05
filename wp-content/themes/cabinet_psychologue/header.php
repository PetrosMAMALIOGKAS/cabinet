<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <?php wp_head(); ?>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" >
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.css" >

  <!-- map styles and script -->
  <?php if ( is_page( 'contact' ) || is_page( 'rendez-vous' )  ) : ?>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>
  <?php endif; ?>

  <!-- <title><?php //bloginfo( 'title' ); ?></title> -->
  <title><?php bloginfo( 'name' ); wp_title(); ?></title>

</head>

<body <?php body_class(); ?>>

  <header class="header shadow">

    <div class="upper-line">
      <div class="container row flex-wrap">

        <div class="logo-container">

          <div class="logo-wrapper">
            <?php the_custom_logo(); ?>
          </div>

          <div class="title-wrapper">
            <a href="<?php echo home_url(); ?>">
              <h1 class="site-name"><?php bloginfo( 'name' ); ?></h1>
            </a>
          </div>

        </div>
        
        <div class="slogan">
          <h3><span class="slogan-texte">Contactez-nous: </span><span class="numero-telephone"><?php echo get_option( 'personal_phone_cabinet_fix' ); ?></span></h3>
        </div>

        <div class="button-rendez-vous">
          <a href="<?php echo get_site_url() . '/rendez-vous'; ?>"><div>Prenez un rendez-vous</div></a>
        </div>
      </div>
    </div>

    <div class="down-line">

      <div class="mobile-container">

        <div class="mobile-upper-wrapper">

          <div class="button-rendez-vous">
            <a href="<?php echo get_site_url() . '/rendez-vous'; ?>"><div>Prenez un rendez-vous</div></a>
          </div>

          <div class="icon-mobile-container">
            <div class="hamburger-icon-wrapper" onclick="mobileMenuFunction()">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </div>
          </div>

        </div>
        
        <?php
        $args = array(
            'theme_location' => 'primary',
            'container' => 'div',
            'menu_id' => 'menu-mobile'
        );

        wp_nav_menu( $args );
        ?>

      </div>


      <div class="container">
        <nav>
          <?php
              $args = array(
                  'theme_location' => 'primary',
                  'container' => 'ul',
                  'menu_class' => 'main-menu row'
              );

              wp_nav_menu( $args );
          ?>
        </nav>
      </div>
    </div>

  </header>
