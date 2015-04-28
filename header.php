<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <!-- BASE -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
  <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" type="image/x-icon" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!-- CSS -->
  <link href="<?php bloginfo('template_directory'); ?>/font-awesome-4.0.3/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
  <!--[if lt IE 9]>
  	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->
  <!-- Google fonts & custom fonts -->
  <link href='//fonts.googleapis.com/css?family=Titillium+Web:400,600,700,300,200,900' rel='stylesheet' type='text/css'>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="masthead" class="site-header" role="banner">
    <section class="wrapper">

      <a class="logo" href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>"></a>

      <a class="menu-toggle" href="#site-navigation">Menu</a>

      <nav class="main-navigation mobile-nav" role="navigation">
        <?php if ( has_nav_menu( 'primary-menu' ) ) {
          wp_nav_menu( array( 'menu_class' => 'sf-menu mobile-menu', 'theme_location' => 'primary-menu', 'container' => false  ) );
        } else {
          // empty menu
        } ?>
      </nav><!-- mobile-nav -->

      <nav class="main-navigation desktop-nav" role="navigation">
        <?php if ( has_nav_menu( 'primary-menu' ) ) {
          wp_nav_menu( array( 'menu_class' => 'sf-menu desktop-menu', 'theme_location' => 'primary-menu', 'container' => false  ) );
        } else {
          // empty menu
        } ?>
      </nav><!-- desktop-nav -->

    </section><!-- #wrapper -->
  </header>
  <!-- #masthead -->
