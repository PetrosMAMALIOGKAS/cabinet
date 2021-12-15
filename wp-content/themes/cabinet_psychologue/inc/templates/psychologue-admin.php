<h1>Psychologue cabinet Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields( 'psychologue-settings-group' ); ?>
	<?php do_settings_sections( 'psychologue_options' ); ?>
	<?php submit_button(); ?>
</form>