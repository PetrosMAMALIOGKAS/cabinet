<?php get_header(); ?>

<main class="archive-page">

  <div class="archive-wrapper">

    <h2 class="archive-title">
      <?php
      if ( is_category() ) {
        echo 'News Archives by Category <br/>' ;
        single_cat_title( 'Category: ');
      }
      else if ( is_author() ) {
        echo 'News Archives by Author: ' .  get_the_author();
        rewind_posts();
      }
      else if ( is_tag() ) {
        echo 'News Archives by Tag: ' .  get_the_author();
        single_tag_title();
      }
      else if ( is_day() ) {
        echo 'News Archives by Day: ' . get_the_date();
      }
      else if ( is_month() ) {
        echo 'News Archives by Month: ' . get_the_date( 'F Y');
      }
      else if ( is_year() ) {
        echo 'News Archives by Year: ' . get_the_date( 'Y' );
      }
      else {
        echo 'News Archives';
      }
      ?>
    </h2>

        <!-- show option select -->
    <div class="container">
      <div class="select-wrapper">
        <?php
        if ( is_category() ) {
          $categories = get_categories( array(
                          'orderby' => 'name',
                          'order'   => 'ASC'
                        ) );
        ?>
        <label for="categorie-select">Selection une categories pour afficher ces posts:</label>
        <select name="categorie-select" id="categorie-select" onchange="location = this.value;">
          <?php
          foreach( $categories as $category ) {

            $category_option = sprintf(
              '<option value="%1$s"',
              esc_url( get_category_link( $category->term_id ) )
            );
            if ( is_category( esc_html( $category->name ) )) {
              $category_option .= ' selected>';
            } else {
              $category_option .= ' >';
            }

            $category_option .= esc_html( $category->name ) . '</option>';

            echo $category_option;
          }
          ?>
        </select>
        <?php
        }  // if is-category
        else if ( is_author() ) {
            //    TODO
        }
        else if ( is_tag() ) {
            //    TODO
        }
        else if ( is_day() ) {
            //    TODO
        }

        else if ( is_month() ) {
            //    TODO
        }
        else if ( is_year() ) {
            //    TODO
        }
        else {
            //    TODO
        }
        ?>
      </div>

      <div id="posts-content">


      <?php if (have_posts()) :  ?>
        <?php while (have_posts()) : the_post(); ?>

          <?php get_template_part( 'parts/content', get_post_format() ); ?>

        <?php  endwhile; ?>

        <!-- Ajax button if there more posts available -->
        <?php if ( $wp_query->max_num_pages > 1 ) : ?>

          <?php
          $current_page = get_query_var( 'paged' ) ? get_query_var('paged') : 1;
          $categorie = $query_variables['category_name'];
          $query_variables = $wp_query->query_vars;
          $categorie = $query_variables['category_name'];
          $query_variables_encoded = json_encode( $wp_query->query_vars );
          $admin_url = admin_url( 'admin-ajax.php' );
          $author_id = get_the_author_meta( 'ID' );

          // More post button creation for all archives types
          if ( is_category() ) {
            $button_html = '<div class="psy_loadmore" data-category=' . $categorie .
                              ' data-current-page=' . $current_page .
                              ' data-query=' . $query_variables_encoded .
                              ' data-max-page=' . $wp_query->max_num_pages .
                              ' data-admin-url=' . $admin_url .
                              '>More posts
                            </div>';
          } 
          else if ( is_author() ) {
            $button_html = '<div class="psy_loadmore" data-author=' . $author_id .
                              ' data-current-page=' . $current_page .
                              ' data-query=' . $query_variables_encoded .
                              ' data-max-page=' . $wp_query->max_num_pages .
                              ' data-admin-url=' . $admin_url .
                              '>More posts
                            </div>';
          }
          else if ( is_tag() ) {
              //    TODO
          }
          else if ( is_day() ) {
              //    TODO
          }
  
          else if ( is_month() ) {
              //    TODO
          }
          else if ( is_year() ) {
              //    TODO
          }
          else {
            $button_html = '<div class="psy_loadmore" ' . 
            ' data-current-page=' . $current_page .
            ' data-query=' . $query_variables_encoded .
            ' data-max-page=' . $wp_query->max_num_pages .
            ' data-admin-url=' . $admin_url .
            '>More posts
          </div>';
          }
        ?>
          <?php echo  $button_html; ?>
        <?php endif; ?>

      <?php else :  ?>

          <?php echo wpautop('Sorry no posts are found.'); ?>

      <?php endif; ?>

    </div>

    </div>
  </div>
</main>


<?php get_footer(); ?>
