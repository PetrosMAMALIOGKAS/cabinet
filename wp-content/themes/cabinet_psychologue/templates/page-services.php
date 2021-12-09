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
                <div class="transparency-layer"><a href="">READ MORE</a></div>
                <?php the_post_thumbnail(); ?>
              </div>
            <?php endif;
            $counter++; ?>
          
            <div class="description">
              <h3><?php echo the_title(); ?></h3>
              <!-- <p><?php //the_content(); ?></p> -->
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
  
  <div class="have-questions-wrapper container">
    <div class="title-wrapper">
      <h2>Have Questions ?</h2>
      <p class="subtitle">Read the FAQ or fill in the form below and get your solution per email</p>
    </div>
    


    <div class="row question-and-form-wrapper">

      <div class="question-accordion-wrapper">
        
        <div class="accordion">
          <?php
          $args = array(  
              'post_type' => 'question',
              'post_status' => 'publish',
              'posts_per_page' => -1, 
              'order' => 'ASC',
              'meta_key'		=> 'is_question_interne',
	            'meta_value'	=> 1
          );

          $questions_loops = new WP_Query( $args ); 
          
          if ( $questions_loops->have_posts() ) :
            while ( $questions_loops->have_posts() ) : $questions_loops->the_post();
            //  echo '<pre>';
            //   var_dump(get_post_meta( get_the_ID() ));
            //   var_dump(get_field('question_interne_question_texte') );
            //  echo '</pre><br/><br/><br/><br/><br/><br/>'; 
              ?>

              <div class="accordion-item">
                <button id="accordion-button-1" class="button-element" aria-expanded="false"><span class="accordion-title"><?php echo get_field('question_interne_question_texte'); ?></span><span class="icon" aria-hidden="true"></span></button>
                <div class="accordion-content">
                  <p><?php echo get_field('question_interne_question_answer'); ?></p>
                </div>
              </div>
              
              <?php
            endwhile;
          endif;

          wp_reset_postdata();
          ?>

        </div>
      </div>



      <div class="form-contact-wrapper">
        <h3>Ask Us</h3>
        
        <!-- <h2>notre gagnote actuelle <?php //echo get_option( 'valeur_cagnotte', 0 ); ?></h2> -->
        <form action="" method="POST" name="questionForm" onsubmit="return validateQuestionForm()" class="comment-form">
          <?php wp_nonce_field( 'faire-don', 'cagnotte-verif' ); ?>

          <!-- <div>
            <label for="don"><?php //_e( 'Amount donation' ); ?></label>
            <input id="don" type="number" name="don" value="5" />
          </div> -->

          <div>
            <label for="question-name" class="input-label"><?php _e( 'Name' ); ?></label><br/>
            <div id="error-name" class="form-error"></div>
            <input id="question-name" type="text" class="input-text" name="question_name" />
            
          </div>

          <div>
            <label for="question-email" class="input-label"><?php _e( 'Email' ); ?></label><br/>
            <div id="error-email" class="form-error"></div>
            <input id="question-email" type="email"  class="input-text" name="question_email" />
            
          </div>

          <div>
            <label for="question-message" class="input-label"><?php _e( 'Question' ); ?></label><br/>
            <div id="error-question" class="form-error"></div>
            <textarea id="question-message"  class="input-textarea" name="question_message"
              rows="5" cols="33"></textarea>
          </div>

          <input id="submit" type="submit" name="cagnote-don-envoi" id="submit" class="submit" value="<?php esc_attr_e( 'Submit Question', 'msk' ); ?>" />
        </form>
      </div>

                  
    </div>







      
    
    


    

  </div>
  
</main>


<?php get_footer(); ?>