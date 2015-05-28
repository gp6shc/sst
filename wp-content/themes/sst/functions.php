<?php
/**
 * Spike functions and definitions
 *
 * @package Spike
 */

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
add_action( 'after_setup_theme', 'spike_setup' );


/**
 * Deregister plugin scripts and styles.
 *
 */

function spike_remove_scripts() {
    wp_dequeue_style( 'tp_twitter_plugin_css' );
    wp_deregister_style( 'tp_twitter_plugin_css' );
}
add_action( 'wp_enqueue_scripts', 'spike_remove_scripts', 20 );

/**
 * Register widgetized areas.
 *
 */
function footer_widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer Left',
		'id'            => 'footer_1',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Center',
		'id'            => 'footer_2',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => 'Footer Right',
		'id'            => 'footer_3',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}
add_action( 'widgets_init', 'footer_widgets_init' );

// Get the home url for shortcode use
function home_url_shortcode() {
	return get_home_url();
} 
add_shortcode('home-url','home_url_shortcode');
