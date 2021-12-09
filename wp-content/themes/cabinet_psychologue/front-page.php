<?php get_header(); ?>

<main>

  <!-- the carousel shortcode -->
  <?php echo do_shortcode('[simpleslider location="homepage" animation="slide" slideshowspeed="5"]'); ?>


  <div class="services-wrapper">
    <div class="container">

      <?php
      $args = array(
        'post_type'     => 'service',
        'post_status'   => 'publish',
        'orderby'       => 'ID',
        'order'         => 'ASC',
      );

      $home_custom_query = new WP_Query( $args );

      $counter = 1;
      ?>

      <!-- Display only the services photos -->
      <div class="services-photos-wrapper row">
        <?php
        if ( $home_custom_query->have_posts() ) {
          while ( $counter < 4 && $home_custom_query->have_posts() ) {
            $home_custom_query->the_post();

            if (  has_post_thumbnail() ) : ?>
              <div class="services-photos services-photo-0<?php echo $counter; ?>">
                <?php the_post_thumbnail(); ?>
              </div>
            <?php endif;

            $counter++;
          }
        }
        wp_reset_query();
        ?>
      </div>

      <!-- Display the rest of services content -->
      <div class="services-widjets row">
        <?php
        $counter = 1;
        $home_custom_query = new WP_Query( $args );
        ?>

        <?php if ( $home_custom_query->have_posts() ) : ?>
          <?php while ( $home_custom_query->have_posts() ) : $home_custom_query->the_post(); ?>

            <div class="service-0<?php echo $counter; ?> row services">
              <div class="icon-container">
                <div>
                  <i class="fa <?php echo get_field( 'fonts_awesome_icon' ); ?>" aria-hidden="true"></i>
                </div>
              </div>
              <div class="description">
                <h3><?php echo the_title(); ?></h3>
                <p><?php the_content(); ?></p>
                <?php  $counter++; ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>

        <?php
        wp_reset_query();
        ?>
      </div>
    </div>
  </div>

  <?php  if ( is_active_sidebar( 'presentation' ) ) : ?>
    <?php  dynamic_sidebar( 'presentation' ); ?>
  <?php endif; ?>


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


    <div class="certificates-wrapper">
      <div class="container">
        <h3>Certificates & Verifications</h3>
        <p>Rania Panousi is highly verified and certificated practicing psychologist</p>
        <div class="certificates-images row">

          <?php
          $args = array(
            'post_type'     => 'slider',
            'post_status'   => 'publish',
            'orderby'       => 'rand',
            'tax_query'     => array(
                                'relation'  => 'AND',
                                    array(
                                      'taxonomy'  => 'slider-loc',
                                      'field'     => 'slug',
                                      'terms'     => 'certifications',
                                   )
                                ),
          );

          $certificates_custom_query = new WP_Query( $args );
          $counter = 1;
          ?>

          <!-- Display only the certifications photos -->
          <?php
          if ( $certificates_custom_query ->have_posts() ) {
            while ($counter < 5 && $certificates_custom_query ->have_posts() ) {
              $certificates_custom_query ->the_post();

              if (  has_post_thumbnail() ) : ?>
                <div class="certif-image">

                  <a href="<?php echo get_field( 'slider-url' ); ?>" target="_blank">
                    <?php the_post_thumbnail(); ?>
                  </a>

                </div>
              <?php endif;

              $counter++;
            }
          }
          wp_reset_query();
          ?>

        </div>
      </div>
    </div>


    <div class="blog-wrapper">
      <div class="container">
        <h2>News and expert advices for better health</h2>
        <p class="subtitle">Interesting news and articles about modern psychology</p>
        <div class="post-wrapper row">
          <?php
          $args = array(
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'posts_per_page' => 3,
          );

          $posts_custom_query = new WP_Query( $args );

          ?>
          <?php if ( $posts_custom_query->have_posts() ) : ?>
            <?php while ( $posts_custom_query->have_posts() ) :  $posts_custom_query->the_post() ?>
                <div class="post">
                  <div class="image-container">
                    <?php the_post_thumbnail(); ?>
                  </div>

                  <div class="informations-post row">
                  <div class="date">
                    <i class="fa fa-calendar"></i>
                    <span><?php the_time( 'F j, Y' ); ?></span>
                  </div>
                  <div class="author">
                    <i class="fa fa-pencil"></i>
                    By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                  </div>
                </div>

                <h3><?php the_title(); ?></h3>

                <p class="categories">
                  <?php
                   /*****************************************
                   *         Show categories of the post
                   **************************************/
                    $categories = get_the_category();  // return array of categories
                    $separator = ", ";
                    $output = "";

                    if ( $categories ) {
                      foreach ( $categories as $category ) {
                        $output .= '<a href="' . get_category_link( $category->term_id ) . '">'
                        . $category->name . '</a>' . $separator;
                      }
                     echo trim( $output, $separator );
                    }
                    ?>
                  </p>

                  <p class="texte">
                      <?php echo get_the_excerpt(); ?>
                  </p>

                  <div class="button-read-more">
                    <a href="<?php the_permalink(); ?>">Read More</a>
                  </div>

                </div>
            <?php endwhile; ?>

          <?php else : ?>
            <?php echo wpautop( 'Sorry no content found..'); ?>
          <?php endif; ?>

          <?php wp_reset_query(); ?>
        </div>
      </div>
    </div>

</main>

<?php get_footer(); ?>
