<?php
/* Functions for scripts to wp head
==================================== */
define('SLIDER_PATH', get_template_directory_uri() . '/' );
//Add the Javascript/CSS File
function ukcea_scripts() {
	wp_enqueue_script('jquery-min', SLIDER_PATH.'js/jquery.min.js', false, "1.10.1");
	wp_enqueue_script('superfish', SLIDER_PATH.'js/superfish.js', false, "1.7.5");
  wp_enqueue_script('theme', SLIDER_PATH.'js/theme.js', false, "1.0.0");
}
add_action( 'wp_enqueue_scripts', 'ukcea_scripts' );
?>
