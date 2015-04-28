<?php
// enable widgets
if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'name'=>'Footer Widget',
		'id' => 'sidebar',
		'description' => 'Widget for footer on pages',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="sidebar-title">',
		'after_title' => '</h3>',
	));
?>
