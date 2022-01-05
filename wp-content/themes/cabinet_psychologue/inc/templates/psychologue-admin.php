<h1>Psychologue cabinet Adresse variables</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php" class="psychologue-general-form">
	<?php settings_fields( 'psychologue-adresse-group' ); ?>
	<?php do_settings_sections( 'psychologue_options' ); ?>
	<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
</form>