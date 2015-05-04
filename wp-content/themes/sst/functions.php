<?php
/**
 * Spike functions and definitions
 *
 * @package Spike
 */

if ( ! function_exists( 'spike_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function spike_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Spike, use a find and replace
	 * to change 'spike' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'spike', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'spike' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'gallery', 'caption'
	) );
	
	// Add featured image support to posts and pages
	add_theme_support( 'post-thumbnails', array( 'page' ) );
	
	/*
	 * Disable the emoji's
	 * Thanks WP 4.2... Stupidest core upgrade ever
	 */
	function disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );	
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
	add_action( 'init', 'disable_emojis' );
}
endif; // spike_setup
add_action( 'after_setup_theme', 'spike_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function spike_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'spike' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'spike_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function spike_scripts() {
	wp_enqueue_style( 'sst-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'spike_scripts' );

