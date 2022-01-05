<?php
// Add this line of code to wp-config.php
// define( 'SMTP_HOST', 'server.a2hosting.com' );  // A2 Hosting server name. For example, "a2ss10.a2hosting.com"
// define( 'SMTP_AUTH', true );
// define( 'SMTP_PORT', '465' );
// define( 'SMTP_SECURE', 'ssl' );
// define( 'SMTP_USERNAME', 'user@example.com' );  // Username for SMTP authentication
// define( 'SMTP_PASSWORD', 'password' );          // Password for SMTP authentication
// define( 'SMTP_FROM',     'user@example.com' );  // SMTP From address
// define( 'SMTP_FROMNAME', 'Kelly Koe' );         // SMTP From name


// musts define all the constant inside the function ex. SMTP_HOST
function psy_send_smtp_email( $phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host       = SMTP_HOST;
    $phpmailer->SMTPAuth   = SMTP_AUTH;
    $phpmailer->Port       = SMTP_PORT;
    $phpmailer->SMTPSecure = SMTP_SECURE;
    $phpmailer->Username   = SMTP_USERNAME;
    $phpmailer->Password   = SMTP_PASSWORD;
    $phpmailer->From       = SMTP_FROM;
    $phpmailer->FromName   = SMTP_FROMNAME;
    $phpmailer->SMTPDebug  = 3;
}
add_action( 'phpmailer_init', 'psy_send_smtp_email' );