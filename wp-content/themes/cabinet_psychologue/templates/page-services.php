<?php
/* Template Name: Services Template */ 
?>


<?php get_header(); ?>

<main>
  <div class="services-page-wrapper container">

    <div class="title-wrapper">
      <h2>Services & Therapy</h2>
      <p class="subtitle">Rania Panousi is highly verified and certificated practicing psychologist</p>
    </div>


    <?php
    $args = array(
      'post_type'     => 'service',
      'post_status'   => 'publish',
      'orderby'       => 'ID',
      'order'         => 'ASC',
    );

    $services_custom_query = new WP_Query( $args );

    $counter = 1;
    ?>

  <!-- Display only the services photos -->
    <div class="services-wrapper row">
      <?php
      if ( $services_custom_query->have_posts() ) {
        while ( $services_custom_query->have_posts() ) { ?>
          <div class="service-post">

            <?php
            $services_custom_query->the_post();

            if (  has_post_thumbnail() ) : ?>
              <div class="services-page-photos-container">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail(); ?>
                </a>
              </div>
            <?php endif;
            $counter++; ?>
          
            <div class="description">
              <a href="<?php the_permalink(); ?>">
                <h3><?php echo the_title(); ?></h3>
              </a>
            </div>  
          </div>
          <?php
        }
      }
      wp_reset_query();
      ?>
    </div>

  </div>

  <div class="presentation-therapy" style="background-image: url('<?php echo get_theme_mod( 'banner_image', get_bloginfo( 'template_directory' ) . '/images/therapy-01.png' ); ?>');">
    <div class="container">
      <h3><?php echo get_theme_mod( 'banner_heading', 'Theraphy with Rania Panousi' ); ?></h3>
      <p class="texte-explicatif"><?php echo get_theme_mod( 'banner_subheading', 'Lorem ipsum dolor sit amet, consectetur a' ); ?></p>
      <div class="ligne-draw"></div>
      <p class="description">
        <?php echo get_theme_mod( 'banner_heading', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem maiores,
                                    suscipit quod sed in voluptatem fuga laboriosam doloribus placeat nam corporis officiis
                                    eum porro quisquam dolores repudiandae optio, id. Consequuntur eos animi eius, natus
                                    amet pariatur mollitia tempora eligendi dolor doloremque vero maxime tempore iure,
                                    explicabo consectetur neque laborum illum. '); ?>
      </p>
      <div class="button">
        <a href="#">Consultation gratuite via Skype</a>
      </div>
    </div>
  </div>
  
</main>

<?php get_footer(); ?>