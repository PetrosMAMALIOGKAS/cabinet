<h1>Psychologue Theme Support </h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="theme-support-form">
	<?php settings_fields( 'psychologue-theme-support' ); ?>
	<?php do_settings_sections( 'psychologue_theme_support_options'); ?>
	<?php submit_button(); ?>
</form>