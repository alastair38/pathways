<?php
/**
 * _s functions and definitions
 *
 * @package _s
 */

include_once(get_template_directory().'/bower_components/acf/acf.php' );

require_once(get_template_directory().'/inc/cpt.php');

if ( ! function_exists( 'dmap_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dmap_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on _s, use a find and replace
	 * to change 'dmap' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'dmap', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dmap' ),
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
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dmap_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // dmap_setup
add_action( 'after_setup_theme', 'dmap_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dmap_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dmap_content_width', 640 );
}
add_action( 'after_setup_theme', 'dmap_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function dmap_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dmap' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'dmap_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dmap_scripts() {
    wp_enqueue_style( 'google fonts', 'http://fonts.googleapis.com/css?family=Raleway', array(), $theme_version, 'all' );

	wp_enqueue_style( 'dmap-style', get_template_directory_uri() . '/css/style.css' );

	wp_enqueue_script( 'dmap-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'dmap-pushy', get_template_directory_uri() . '/js/pushy.js', array(), '20120216', true );

	wp_enqueue_script( 'dmap-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
    //adding accessible-modal script file in the footer
    wp_enqueue_script( 'accessible-modal-js', get_template_directory_uri() . '/js/accessible-modal.js', array( 'jquery' ), $theme_version, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dmap_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Hook into pre_save_post to enable creation of new post objects from front end form
 */

function my_pre_save_post( $post_id ) {

    // check if this is to be a new post
    if( $post_id != 'new' )
    {
        return $post_id;
    }

    $titleArray = $_POST['fields']['field_557aad6fbac09'];
    $title = $titleArray['address'];
    // Create a new post
    $post = array(
        'post_status'  => 'draft',
        'post_title'  => $title,
        'post_type'  => 'locations',
    );

    // insert the post
    $post_id = wp_insert_post( $post );

    // update $_POST['return']
    $_POST['return'] = add_query_arg( array('post_id' => $post_id), $_POST['return'] );

    // return the new ID
    return $post_id;
}

add_filter('acf/pre_save_post' , 'my_pre_save_post' );


add_action('init', 'page_excerpts');
function page_excerpts() {
	add_post_type_support( 'page', 'excerpt' );
}
