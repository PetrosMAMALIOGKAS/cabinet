<?php
/* Template Name: Rendez-vous Template */ 
?>

<?php get_header(); ?>

<main class="rendez-vous-page" >

  <div class="page-title">
    <h2 class="title">Make an Appointment</h2>
    <p class="subtitle">Fill in the form below or simply make an appointment by call
</p>
  </div>

  <div class="row container">
    <div class="form-contact-wrapper">
      <h3>Ask Us</h3>
      
      <!-- <h2>notre gagnote actuelle <?php //echo get_option( 'valeur_cagnotte', 0 ); ?></h2> -->
      <form action="#" method="POST" name="rendezVousForm" onsubmit="return validateRendezVousForm()" class="comment-form">
        <?php wp_nonce_field( 'faire-don', 'cagnotte-verif' ); ?>

        <div>
          <label for="rendez-vous-name" class="input-label"><?php _e( 'Name' ); ?></label><br/>
          <div id="rendez-vous-error-name" class="form-error"></div>
          <input id="rendez-vous-name" type="text" class="input-text" name="rendez_vous_name" />
        </div>

        <div>
          <label for="rendez-vous-email" class="input-label"><?php _e( 'Email' ); ?></label><br/>
          <div id="rendez-vous-error-email" class="form-error"></div>
          <input id="rendez-vous-email" type="email"  class="input-text" name="rendez_vous_email" />
        </div>

        <div>
          <label for="rendez-vous-phone" class="input-label"><?php _e( 'Phone' ); ?></label><br/>
          <div id="rendez-vous-error-phone" class="form-error"></div>
          <input id="rendez-vous-email" type="text"  class="input-text" name="rendez_vous_phone" />
        </div>


        <div>
          <label for="rendez-vous-age" class="input-label"><?php _e( 'Age group' ); ?></label><br/>
          <select name="rendez_vous_age" id="rendez-vous-age">
            <option value=""><?php _e( 'Please choose an option' ); ?></option>
            <?php 
            $field = get_field_object('field_61a8ce17ad6be');
            $choices_age = $field['choices'];
            foreach ($choices_age as $key => $value) : ?>

              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div>
          <label for="rendez-vous-reason" class="input-label"><?php _e( 'Reason of Appointement' ); ?></label><br/>
          <select name="rendez_vous_reason" id="rendez-vous-reason">
            <option value=""><?php _e( 'Please choose an option' ); ?></option>
            <?php 
            $field = get_field_object('field_61a8cf3cad6bf');
            $choices_reason = $field['choices'];
            foreach ($choices_reason as $key => $value) : ?>

              <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        
        <div>
          <label for="rendez-vous-message" class="input-label"><?php _e( 'Question' ); ?></label><br/>
          <div id="error-question" class="form-error"></div>
          <textarea id="rendez-vous-message"  class="input-textarea" name="rendez-vous_message"
            rows="5" cols="33"></textarea>
        </div>

        <input id="submit" type="submit" name="cagnote-don-envoi" id="submit" class="submit" value="<?php esc_attr_e( 'Submit', 'msk' ); ?>" />
      </form>
    </div>

    <div class="map-wrapper">
      <div id="map" style="height: 360px; width: 100%;"></div>
    </div>

  </div>
</main>




<?php get_footer(); ?>