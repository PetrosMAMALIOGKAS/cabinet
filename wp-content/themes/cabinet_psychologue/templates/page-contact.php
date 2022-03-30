<?php
/* Template Name: Contact Template */ 
?>

<?php get_header(); ?>


<main class="contact-page" >
  <div class="page-title">
    <h2 class="title">Get in Touch</h2>
    <p class="subtitle">Rania Panousi is highly verified and certificated practicing psychologist</p>
  </div>
  
  <div id="map" style="height: 360px;
  width: 100%;">

  </div>

  <!-- <uuuuuu> -->
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
          <?php wp_nonce_field( 'submit_question_form', 'nonce_question' ); ?>

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

          <input id="submit" type="submit" name="question_form_envoi" id="submit" class="submit" value="<?php esc_attr_e( 'Submit Question', 'msk' ); ?>" />
        </form>
      </div>

                  
    </div>

  </div>



  <!-- </uuuuuu> -->
</main>



<?php get_footer(); ?>