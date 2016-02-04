<?php

/**
 * Theme Functions
 *
 * @package WordPress
 * @subpackage HM_Base_Theme
 */
if ( ! function_exists( 'twentysixteen_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * Create your own twentysixteen_setup() function to override in a child theme.
	 *
	 * @since Twenty Sixteen 1.0
	 */
	function twentysixteen_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Sixteen, use a find and replace
		 * to change 'twentysixteen' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'twentysixteen' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		/*
		 * This theme styles the visual editor to resemble the theme style,
		 * specifically font, colors, icons, and column width.
		 */
		add_editor_style();
	}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

/**
 * Enqueue scripts and styles for front-end.
 *
 * @return null
 * @since 0.1.0
 */
function rgy_scripts_styles() {
	wp_enqueue_style( 'rgy-styles', get_template_directory_uri() . "/assets/css/theme.css", array(), '' );
	wp_enqueue_script( 'bxslider', get_template_directory_uri() . "/assets/js/bxslider.min.js", array( 'jquery' ), '', true );
	wp_enqueue_script( 'rgy-bxslider', get_template_directory_uri() . "/assets/js/rgy-bxslider.js", array( 'bxslider' ), '', true );
	wp_enqueue_script( 'lettering', get_template_directory_uri() . "/assets/js/lettering.js", array( 'jquery' ), '', true );
	wp_enqueue_script( 'rgy-lettering', get_template_directory_uri() . "/assets/js/rgy-lettering.js", array( 'lettering' ), '', true );
	wp_enqueue_script( 'rgy-toggle', get_template_directory_uri() . "/assets/js/toggle.js", array( ), '', true );
	wp_enqueue_script( 'rgy-show-nav', get_template_directory_uri() . "/assets/js/show-nav.js", array( 'jquery' ), '', true );

}
add_action( 'wp_enqueue_scripts', 'rgy_scripts_styles' );

function hide_editor() {
	global $pagenow;
	if( !( 'post.php' == $pagenow ) ) return;
	// Get the Post ID.
	$post_id = $_GET[ 'post' ] ? $_GET[ 'post' ] : $_POST[ 'post_ID' ] ;

	if( !isset( $post_id ) ) return;

	// Hide the editor on the page titled 'Homepage'
	$page = get_the_title($post_id);
	if( $page == 'Home' ){
		remove_post_type_support( 'page', 'editor' );
	}
}

add_action( 'admin_head', 'hide_editor' );


require get_template_directory() . '/inc/template-tags.php';
