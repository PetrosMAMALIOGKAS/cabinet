
<h1>Personnal information</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php" class="theme-support-form">
	<?php settings_fields( 'psychologue-personnal-information-group' ); ?>
	<?php do_settings_sections( 'psychologue_personal_options'); ?>
	<?php submit_button(); ?>
</form>


<?php

echo 'hello world psychologue-admin-information.php';
?>