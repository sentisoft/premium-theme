<?php
/* This theme uses wp_nav_menu()
==================================== */
register_nav_menus( array(
  'primary-menu' => __( 'Primary Menu' )
));
/* Remove div from wp_nav_menu()
==================================== */
function my_wp_nav_menu_args( $args = '' )
{
  $args['container'] = false;
  return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );
/* This function allows for the auto-creation of post excerpts
==================================== */
function truncate_post($amount,$quote_after=false) {
  $truncate = get_the_content();
  $truncate = strip_shortcodes( $truncate );
  $truncate = strip_tags($truncate);
  $truncate = substr($truncate, 0, strrpos(substr($truncate, 0, $amount), ' '));
  echo $truncate;
  echo "...";
  if ($quote_after) echo('');
}
function list_pings($comment, $args, $depth) {
  $GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID(); ?>"><?php comment_author_link(); ?>
<?php } ?>
<?php
add_filter('get_comments_number', 'comment_count', 0);
function comment_count( $count ) {
  if ( ! is_admin() ) {
    global $id;
    $comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
    return count($comments_by_type['comment']);
  } else {
    return $count;
  }
}
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
