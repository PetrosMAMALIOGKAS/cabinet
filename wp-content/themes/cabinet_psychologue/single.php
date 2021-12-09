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

              <p class="texte">
                  <?php the_content(); ?>
              </p>

      <?php endwhile; ?>

    <?php else : ?>
      <?php echo wpautop( 'Sorry no content found..'); ?>
    <?php endif; ?>

            </div>

            <div class="sidebar">
              <?php  if ( is_active_sidebar( 'sidebar_categories' ) ) : ?>
                <?php  dynamic_sidebar( 'sidebar_categories' ); ?>
              <?php endif; ?>

              <?php  if ( is_active_sidebar( 'sidebar_latest_posts' ) ) : ?>
                <?php  dynamic_sidebar( 'sidebar_latest_posts' ); ?>
              <?php endif; ?>
            </div>

        </div>
      </div>
    </div>
</main>

<?php get_footer(); ?>
