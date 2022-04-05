

<footer>

  <div class="footer-intro">
    <div class="container row">

      <?php  if ( is_active_sidebar( 'footer_top' ) ) : ?>
        <?php  dynamic_sidebar( 'footer_top' ); ?>
      <?php endif; ?>

    </div>
  </div>


  <div class="footer-main">
    <div class="container row">

      <div class="about-wrapper">
        <?php  if ( is_active_sidebar( 'about' ) ) : ?>
          <?php  dynamic_sidebar( 'about' ); ?>
        <?php endif; ?>
      </div>


      <div class="navigation-container">
        <h3>Navigation</h3>
        <?php
        $args = array(
          'theme_location' => 'footer',
          'container'      => 'ul',
          'menu_class'     => 'navigation-menu'
        );

        wp_nav_menu( $args );
        ?>
      </div>

      <div class="services-container">
        <h3>Services</h3>
        <ul class="sevices-menu">
          <?php
          $args = array(
            'post_type'     => 'service',
            'post_status'   => 'publish',
            'orderby'       => 'rand',
          );

          $services_custom_query = new WP_Query( $args );

          $counter = 1;
          ?>

          <?php if ( $services_custom_query->have_posts() )  : ?>
            <?php while ( $counter < 5 && $services_custom_query->have_posts() ) : ?>
              <?php
              $services_custom_query->the_post();

              echo '<li><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></li>';
              $counter++;
              ?>

            <?php endwhile; ?>
          <?php endif; ?>
          <?php
          wp_reset_query();
          ?>
        </ul>
      </div>

    </div>

    <hr/>
    <p class="copyright"> &#169; 2021 Petros Mamalios | All Rights Reserved </p>

  </div>



</footer>

<?php wp_footer(); ?>

</body>
</html>
