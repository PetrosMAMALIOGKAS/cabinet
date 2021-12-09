<?php get_header(); ?>

<main class="blog-page">

  <div class="blog-wrapper">


    <div class="title-wrapper">
      <h2>Latest News</h2>
      <p class="subtitle">Stay healthy with Experts Advices</p>
    </div>

    <div class="container">
      <div class="post-wrapper row">

        <?php if ( have_posts() ) : ?>

          <?php while ( have_posts() ) : the_post() ?>

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
        </div>

        <div class="pagination">
          <?php
          $args_pagination = array(
            'prev_text' => __( '&laquo; Prev', 'textdomain' ),
            'next_text' => __( 'Next &raquo;', 'textdomain' ),
          );

          echo paginate_links( $args_pagination );
          ?>
        </div>


        <?php else : ?>
          <?php echo wpautop( 'Sorry no content found..'); ?>
        <?php endif; ?>

    </div>
  </div>
</main>

<?php get_footer(); ?>
