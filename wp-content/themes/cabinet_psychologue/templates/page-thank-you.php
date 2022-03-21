<?php
/* Template Name: Thank you Template */ 
?>

<?php get_header(); ?>


<main class="thank-you-page container" >
  <?php
  
  if ( isset( $_GET['source'] ) && $_GET['source'] != '' )   :
      $source_page = $_GET['source'];
  endif;
  ?>

  <?php if (@$source_page == 'question') : ?>
    <h2>Merci pour votre <?php echo $source_page; ?></h2>
    <a href="<?php echo get_home_url(); ?>">Return to the home page</a>
  <?php endif; ?>



  <?php if (@$source_page == 'rendez-vous') : ?>
    <h2>Merci votre <?php echo $source_page; ?> a été enregistre</h2>
    <a href="<?php echo get_home_url(); ?>">Return to the home page</a>
  <?php endif; ?>





  <?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>    
	  <?php 
    the_content();
    ?>
	<?php endwhile; ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>