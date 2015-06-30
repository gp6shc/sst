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
	<meta name="keywords" content="lauren's kids,sexual abuse prevention curriculum, laurens kids, sexual, abuse, teen, curriculum, middleschool, highschool, prevention, child sexual abuse, lauren book">
	<meta name="description" content="Tap into your personal power and be an advocate for change in your community! This program empowers students to use their voices to better protect themselves and others. Everyone has the right to be safe and speak up when they feel uncomfortable.">
	<meta property="og:title" content="<?php the_title(); ?>">
	<meta property="og:url" content="<?php the_permalink(); ?>">
	<meta name="theme-color" content="#501B73">
	
	<title><?php wp_title( '|', true, 'right' ); bloginfo('name'); ?></title>
	<script type="text/javascript" async="async">
		function hasSVG() {return document.implementation.hasFeature("http://www.w3.org/TR/SVG11/feature#Image", "1.1");}if ( !hasSVG() ) document.documentElement.className += " no-svg";
	</script>

	<link rel="stylesheet" href="<?= get_stylesheet_directory_uri()?>/style.css" type="text/css" media="all">
	<link rel="icon" sizes="any" mask href="sst_icon.svg">
	<link rel="shortcut icon" href="<?= home_url("favicon.ico")?>"/>	

	<noscript>
		<style>
			.row > div:first-child {
				transform: none;
			}
				
			.row > div:last-child {
				transform: none;
			}
			.row > div .grid-content {
				opacity: 1;
			}
			.answer {
				max-height: 700px;
				padding: 1.25em 0.75em 1.25em 2.3em;
			}
			@media (max-width: 767px) {
				.row > .grunge.grunge {
					transform: none;
				}
				
				.row > .change-collage.change-collage {
					transform: none;
				}
			}
		</style>
	</noscript>
	
	<!--[if IE]>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/ie.css" type="text/css" media="all">
	<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="white-bg">
	<a class="skip-link screen-reader-text btn" href="#content">Skip to content</a>
	<header class="site-header" id="js-header" role="banner">
		<div class="nav-wrapper constrain">
		
			<div class="menu-button" id="js-menu-button">
				<div class="top"></div>
				<div class="mid"></div>
				<div class="bot"></div>
			</div>
			
			<div class="site-branding">
				<a class="no-hover-line" href="<?= home_url(); ?>"><img src="<?= get_stylesheet_directory_uri()?>/img/sst-logo.svg" onerror="this.src='<?= get_stylesheet_directory_uri()?>/img/sst-logo.png'; this.onerror=null;" alt="Safer, Smarter Teens" title="Safer, Smarter Teens"/></a>
			</div>
	
			<nav class="main-navigation" role="navigation" id="js-main-menu">
				<div class="main-nav-wrap">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			</nav>
			
			<?php if ( is_active_sidebar( 'header_btn' ) ) : ?>
			<div class="order-now-wrapper">
				<?php dynamic_sidebar('header_btn');?>
			</div>
			<?php endif; ?>
		</div>
	</header>

	<div id="content" class="site-content">
