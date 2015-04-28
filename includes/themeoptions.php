<?php
$themename = "SWT Theme";
$shortname = "swt";
$himg_dir = get_bloginfo('template_directory');
$options = array (
array( "name" => $themename." Options",
       "type" => "title"),
array( "name" => "Additional Settings",
       "type" => "section"),
array( "type" => "open"),
array("name" => "Facebook link",
            "id" => $shortname."_facebook_link",
            "type" => "text",
            "std" => "#"),
array("name" => "Twitter link",
            "id" => $shortname."_twitter_link",
            "type" => "text",
            "std" => "#"),
array("name" => "Youtube link",
            "id" => $shortname."_youtube_link",
            "type" => "text",
            "std" => "#"),
array("name" => "LinkedIn link",
            "id" => $shortname."_linkedin_link",
            "type" => "text",
            "std" => "#"),
array("name" => "Contact mail",
            "id" => $shortname."_contact_mail",
            "type" => "text",
            "std" => "#"),
array( "type" => "close"),
);
function mytheme_add_admin() {
global $themename, $shortname, $options;
  if ( isset( $_GET['page'] ) && $_GET['page'] == basename(__FILE__) ) {
    if ( isset( $_REQUEST["action"] ) && $_REQUEST["action"] === 'save') {
      foreach ($options as $value) {
        if( !isset( $value['id'] ) )
          continue;
        if( !isset( $_REQUEST[$value['id']] ) ) {
          continue;
        }
        if( isset( $_REQUEST[ $value['id'] ] ) ) {
          update_option( $value['id'], $_REQUEST[ $value['id'] ]  );
        } else {
          if ( isset( $value['id'] ) && get_option( $value['id'] ) ) {
            delete_option( $value['id'] );
          }
        }
      }
      header("Location: admin.php?page=themeoptions.php&saved=true");
    die;
    } else if ( isset( $_REQUEST["action"] ) && $_REQUEST["action"] === 'reset') {
      foreach ($options as $value) {
          if ( isset( $value['id'] ) && get_option( $value['id'] ) ) {
            delete_option( $value['id'] );
          }
      }
      header("Location: admin.php?page=themeoptions.php&reset=true");
    die; }
  }
  add_menu_page($themename." Options", "$themename", 'edit_themes', basename(__FILE__), 'mytheme_admin', get_template_directory_uri() .'/images/icon.png');
}
function mytheme_add_init() {
$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/includes/admin/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/includes/admin/rm_script.js", false, "1.0");
wp_enqueue_script("my-script", $file_dir."/includes/admin/my-script.js", false, "1.0");
wp_enqueue_script('wp-color-picker-script', $file_dir."/includes/admin/color_picker.js", array( 'wp-color-picker' ), false, true );
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
}
function my_admin_styles() {
wp_enqueue_style('thickbox');
wp_enqueue_style( 'wp-color-picker' );
}
if (isset($_GET['page']) && $_GET['page'] == 'themeoptions.php') {
add_action('admin_print_styles', 'my_admin_styles');
}
function mytheme_admin() {
global $themename, $shortname, $options;
$i=0;
if ( isset( $_REQUEST['saved'] ) && $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( isset( $_REQUEST['reset'] ) && $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
?>
<div class="wrap rm_wrap">
<h2>Settings <?php echo $themename; ?></h2>
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
case "open":
?>
<?php break;
case "close":
?>
</div>
</div>
<br>
<?php break;
case "title":
?>
<p><?php echo ''; ?></p>
<?php break;
case 'text':
?>
<div class="rm_input rm_text">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( isset( $value['id']) && get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" />
<small><?php if ( isset( $value['desc'] ) && $value['desc'] ) echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php break;
case "titlesection":
?>
<div style="width:95%;background-color:#888;color:#fff;font-size:12px;padding:10px 1.5%;font-weight:700; display:block; margin:10px auto 0;-webkit-border-radius: 3px;-moz-border-radius: 3px;-o-border-radius: 3px;-ms-border-radius: 3px;border-radius: 3px;"><?php echo $value['name']; ?></div>
<?php break;
case "colorpicker":
?>
<div class="rm_input rm_text">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( isset( $value['id']) && get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } else { echo $value['std']; } ?>" class="wp-color-picker-field" data-default-color="#ffffff" style="width:80px;" />
<small><?php echo $value['desc']; ?> <?php echo $value['std']; ?></small><div class="clearfix"></div>
</div>
<?php break;
case "upload":
?>
<div class="rm_input rm_text">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( isset( $value['id']) && get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'])  ); } ?>" />
<input class="image_uploader_button" type="button" value="Upload" />
<small><?php echo $value['desc']; ?></small>
</div>
<?php
break;
case 'textarea':
?>
<div class="rm_input rm_textarea">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( isset( $value['id']) && get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id']) ); } else { echo $value['std']; }?></textarea>
<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
case 'select':
?>
<div class="rm_input rm_select">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) {
	if ( (get_option( $value['id'] ) == $option) || ($option == $value['std']) ) {
		$selected = "selected=\"selected\"";
	} else {
		$selected = "";
	}
?>
<option value="<?php echo $option ?>" <?php echo $selected ?>><?php echo $option; ?></option>
<?php } ?>
</select>
<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
case "checkbox":
?>
<div class="rm_input rm_checkbox">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php break;
case "section":
$i++;
?>
<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/includes/admin/images/trans.gif" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" class="button button-primary button-large" />
</span>
<div class="clearfix"></div>
</div>
<div class="rm_options">
<?php break;
}
}
?>
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<a id="popup-button" href="" class="button popup-button">Reset Theme</a> &nbsp;&nbsp;<span>You can reset all setting... </span>
<div id="hidden-reset" class="hidden-reset">
<h3>Be very careful with this.. Will delete all settings.</h3>
<input name="reset" type="submit" value="Reset" class="button action" />
<a id="close-popup" class="button popup-button">Cancel</a>
</div>
<input type="hidden" name="action" value="reset" />
</p>
</form>
</div>
</div>
<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');
?>
