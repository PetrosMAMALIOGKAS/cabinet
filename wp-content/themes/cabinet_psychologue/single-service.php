<?php get_header(); ?>

<main class="single-page">

  <div class="blog-wrapper">

    <?php if ( have_posts() ) : ?>

      <?php while ( have_posts() ) : the_post() ?>

        <div class="title-wrapper">
          <h3><?php the_title(); ?></h3>
        </div>

        <div class="container">
          <div class="post-wrapper row">
            <div class="post">

              <div class="image-container">
                <?php the_post_thumbnail(); ?>
              </div>

              <p class="categories">
                <?php
                $categories = get_the_category();  // return array of categories
                $separator = ", ";
                $output = "categories : ";

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
                  <?php the_content(); ?>
              </p>

              <div class="navigation-links-container">
              
                <div class="previous">
                  <?php
                  $prev_post = get_previous_post();
                  if($prev_post) :
                    $prev_title = strip_tags( str_replace( '"', '', $prev_post->post_title ) );
                    echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">  <i class="fa fa-chevron-circle-left" aria-hidden="true"></i>
                    '. $prev_title . '</a>' . "\n";
                  endif;
                  ?>
                </div>
  
                <div class="next">
                  <?php next_post_link('%link', '%title  <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>', ); ?>
                </div>

              </div>
              

      <?php endwhile; ?>

    <?php else : ?>
      <?php echo wpautop( 'Sorry no content found..'); ?>
    <?php endif; ?>

            </div>

        </div>
      </div>
    </div>
</main>

<?php get_footer(); ?>