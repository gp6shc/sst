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
		'primary' => 'Primary Menu',
		'awareness' => 'Awareness Menu',
		'action' => 'Action Menu'
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
	
	// Enable shortcodes in widgets
	add_filter('widget_text', 'do_shortcode');
	
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
	
	/**
	 * Filter function used to remove the tinymce emoji plugin.
	 * 
	 * @param    array  $plugins  
	 * @return   array             Difference betwen the two arrays
	 */
	function disable_emojis_tinymce( $plugins ) {
		if ( is_array( $plugins ) ) {
			return array_diff( $plugins, array( 'wpemoji' ) );
		} else {
			return array();
		}
	}
}
add_action( 'after_setup_theme', 'spike_setup' );


/**
 * Deregister plugin scripts and styles.
 *
 */

function spike_remove_scripts() {
    wp_dequeue_style( 'tp_twitter_plugin_css' );
    wp_deregister_style( 'tp_twitter_plugin_css' );
    wp_dequeue_style( 'contact-form-7' );
    wp_deregister_style( 'contact-form-7' );
}
add_action( 'wp_enqueue_scripts', 'spike_remove_scripts', 20 );

/**
 * Register widgetized areas.
 *
 */
function footer_widgets_init() {

	register_sidebar( array(
		'name'          => 'Header Button',
		'id'            => 'header_btn',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
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

// Shortcodes:

// Get the home url for shortcode use
function home_url_shortcode() {
	return get_home_url();
} 
add_shortcode('home-url','home_url_shortcode');

// Returns current year
function year_shortcode() {
  $year = date('Y');
  return $year;
}
add_shortcode('current-year', 'year_shortcode');


// Disable support for comments and trackbacks in post types
	function df_disable_comments_post_types_support() {
	    $post_types = get_post_types();
	    foreach ($post_types as $post_type) {
	        if(post_type_supports($post_type, 'comments')) {
	            remove_post_type_support($post_type, 'comments');
	            remove_post_type_support($post_type, 'trackbacks');
	        }
	    }
	}
	add_action('admin_init', 'df_disable_comments_post_types_support');
	
	// Close comments on the front-end
	function df_disable_comments_status() {
	    return false;
	}
	add_filter('comments_open', 'df_disable_comments_status', 20, 2);
	add_filter('pings_open', 'df_disable_comments_status', 20, 2);
	 
	// Hide existing comments
	function df_disable_comments_hide_existing_comments($comments) {
	    $comments = array();
	    return $comments;
	}
	add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
	 
	// Remove comments page in menu
	// Also remove posts menu item
	function df_disable_comments_admin_menu() {
	    remove_menu_page('edit-comments.php');
	    remove_menu_page('edit.php');
	}
	add_action('admin_menu', 'df_disable_comments_admin_menu');
	 
	// Redirect any user trying to access comments page
	function df_disable_comments_admin_menu_redirect() {
	    global $pagenow;
	    if ($pagenow === 'edit-comments.php') {
	        wp_redirect(admin_url()); exit;
	    }
	}
	add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
	 
	// Remove comments metabox from dashboard
	function df_disable_comments_dashboard() {
	    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	}
	add_action('admin_init', 'df_disable_comments_dashboard');
	 
	// Remove comments links from admin bar
	function df_disable_comments_admin_bar() {
	    if (is_admin_bar_showing()) {
	        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	    }
	}
	add_action('init', 'df_disable_comments_admin_bar');

?>