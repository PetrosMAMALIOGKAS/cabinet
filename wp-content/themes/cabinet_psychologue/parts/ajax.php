          <article class="post row">
            <div class="image-container">
              <?php the_post_thumbnail(); ?>
            </div>

            <div class="content-wrapper">

              <h3><?php the_title(); ?></h3>

              <div class="informations-post row">
                <div class="date">
                  <i class="fa fa-calendar"></i>
                  <span><?php the_time( 'F j, Y' ); ?></span>
                </div>

                <div class="author">
                  <i class="fa fa-pencil"></i>
                  By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
                </div>

                <p class="categories">
                  <i class="fa fa-th-large" aria-hidden="true"></i>

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

                <div class="tags">
                  <i class="fa fa-tags" aria-hidden="true"></i>
                  no tags
                </div>

              </div>

              <p class="texte">
                  <?php echo get_the_excerpt(); ?>
              </p>

              <div class="button-read-more">
                <a href="<?php the_permalink(); ?>">Read More</a>
              </div>

            </div>

          </article>
          <span class="border-bottom-line"></span>