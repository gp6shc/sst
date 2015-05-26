<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Spike
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/style.css" type="text/css" media="all">
<!--
	<script src="//use.typekit.net/lvk5xgy.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
-->
<!--<link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700' rel='stylesheet' type='text/css'> -->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<a class="skip-link screen-reader-text btn" href="#content">Skip to content</a>

	<header class="site-header" role="banner">
		<div class="nav-wrapper constrain">
			<div class="site-branding">
				<a href="/"><img src="<?php echo get_stylesheet_directory_uri()?>/img/sst-logo.svg" alt="Safer, Smarter Teens" title="Safer, Smarter Teens"/></a>
			</div>
	
			<nav class="main-navigation" role="navigation">
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- .main-navigation -->
			
			<a class="btn-double order-now" href="#">Order Now!</a>
		</div>
	</header><!-- .site-header -->

	<div id="content" class="site-content">
