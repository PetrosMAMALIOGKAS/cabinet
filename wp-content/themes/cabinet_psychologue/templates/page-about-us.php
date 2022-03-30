<?php
/* Template Name:  About us Template */ 
?>

<?php get_header(); ?>

<main class="about-us-page" >

  




  <div class="container">

    <div class="flex-container">
    <?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : the_post() ?>

        <div class="left-container">
          <h1>
            <?php echo get_field('psychologue_name'); ?>
          </h1>
          <p class="psychologue-title">
            <?php echo get_field('psychologue_titre'); ?>
          </p>

          <p class="texte-container">
            <?php echo get_field('psychologue_texte_1'); ?>
          </p>

          <?php
          $texte_2 = get_field('psychologue_texte_2');
          if( !empty( $texte_2 ) ): ?>
          <p class="texte-container second">
            <?php echo $texte_2; ?>
          </p>
          <?php endif; ?>
          
          <?php
          $texte_3 = get_field('psychologue_texte_3');
          if( !empty( $texte_3 ) ): ?>
            <p class="texte-container third">
              <?php echo $texte_3; ?>
            </p>
          <?php endif; ?>

          <div class="psychologue-slogan">
            <p class="quotes-container">&#8223;</p>
            <p class="slogan-container"><?php echo get_field('psychologue_slogan'); ?></p>
          </div>
          <p class="texte-container">
            <?php echo get_field('psychologue_texte_4'); ?>
          </p>

          <?php
          $image_signature = get_field('psychologue_signature'); 
          if( !empty( $image_signature ) ): ?>

          <div class="img-container">
            <img src="<?php echo esc_url($image_signature['url']); ?>" alt="<?php echo esc_attr($image_signature['alt']); ?>" />
          </div>

          <?php endif; ?>
        </div>  

        <div class="right-container psychoolgue-image">


          <?php 
          $image_psy = get_field('psychologue_image'); 
          if( !empty( $image_psy ) ): ?>

          <div class="img-container">
            <img src="<?php echo esc_url($image_psy['url']); ?>" alt="<?php echo esc_attr($image_psy['alt']); ?>" />
          </div>

          <?php endif; ?>

          
          <?php 
          $image_cabinet = get_field('cabinet_image'); 
          if( !empty( $image_cabinet ) ): ?>
          <div class="img-container cabinet-image">
            <img src="<?php echo esc_url($image_cabinet['url']); ?>" alt="<?php echo esc_attr($image_cabinet['alt']); ?>" />
          </div>

          <?php endif; ?>

        </div>
        


    <?php endwhile; ?>

    <?php endif; ?>

    </div>
  
  </div>
</main>

<?php get_footer(); ?>



