<?php
/**
 * The template for displaying the header.
 *
 * @package WordPress
 * @subpackage HM_Base_Theme
 */
?>

<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>

 	<?php // no-js/js class. Help prevent FOUC. Can remove if Modernizr is used. ?>
	<script type="text/javascript">(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>

	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/externals/html5.js" type="text/javascript"></script>
	<![endif]-->

</head>

<body>
<header id="masthead" class="site-header" role="banner">
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<img src="<?php echo get_template_directory_uri();?>/assets/images/Menu-icon.png" alt="menu icon"><span style="display:none;"><?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?></span>
	</nav><!-- #site-navigation -->

	<div class="logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png" alt="logo"></a>
	</div>

	<div class="contact-info">
		<img src="<?php echo get_template_directory_uri();?>/assets/images/Contact-icon.png" alt="contact icon">
	</div>
</header><!-- #masthead -->