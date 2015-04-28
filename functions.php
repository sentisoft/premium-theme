<?php
/* Load Theme Functions
==================================== */
require_once(get_template_directory() . '/includes/themeoptions.php');
require_once(get_template_directory() . '/includes/widgets.php');
require_once(get_template_directory() . '/includes/theme-functions.php');
// remove version info from head and feeds
function complete_version_removal() {
  return '';
}
add_filter('the_generator', 'complete_version_removal');
remove_action('wp_head', 'wp_generator');
// Remove Recent_Comments inline style from wp head
function twentyten_remove_recent_comments_style() {
  global $wp_widget_factory;
  remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );
// This sets the HTML Editor as default
add_filter( 'wp_default_editor', create_function('', 'return "html";') );
// Disable WordPress Admin Bar for all users but admins. */
show_admin_bar(false);
// Switches default core markup for search form, comment form, and comments
// to output valid HTML5.
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
// Adds RSS feed links to <head> for posts and comments.
add_theme_support( 'automatic-feed-links' );
//	Add post-thumbnail support
add_theme_support( 'post-thumbnails' );
// Makes theme available for translation.
load_theme_textdomain( 'ukcea', get_template_directory() . '/languages' );
// support title tag
add_theme_support( 'title-tag' );
?>
