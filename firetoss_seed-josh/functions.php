<?php
/**
 * Firetoss Theme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Firetoss_Theme
 */

if ( ! function_exists( 'firetoss_seed_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function firetoss_seed_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Firetoss Theme, use a find and replace
	 * to change 'firetoss_seed' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'firetoss_seed', get_template_directory() . '/languages' );

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
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'firetoss_seed' ),
		'footer' => esc_html__( 'Footer', 'firetoss_seed' ),
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

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'firetoss_seed_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'firetoss_seed_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function firetoss_seed_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'firetoss_seed_content_width', 640 );
}
add_action( 'after_setup_theme', 'firetoss_seed_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function firetoss_seed_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'firetoss_seed' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'firetoss_seed' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'firetoss_seed_widgets_init' );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}
//
//// acf options page
//if( function_exists('acf_add_options_page') ) {
//    acf_add_options_page();
//}


/**
 * Enqueue scripts and styles.
 */
function firetoss_seed_scripts() {
	wp_enqueue_style( 'firetoss_seed-style', get_stylesheet_uri() );

	wp_enqueue_script( 'firetoss_seed-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'firetoss_seed-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'firetoss_seed_scripts' );

// Register Script
/**
 *
 */
function custom_scripts() {
// Add yours here following the below format
    wp_register_script( 'owl-script',  get_template_directory_uri() . '/js/owl.carousel.js', false, false, true );
    wp_enqueue_script( 'owl-script',  get_template_directory_uri() . '/js/owl.carousel.js', false, false, true  );

    wp_register_script( 'mean-menu',  get_template_directory_uri() . '/js/jquery.meanmenu.js', false, false, true );
    wp_enqueue_script( 'mean-menu',  get_template_directory_uri() . '/js/jquery.meanmenu.js', false, false, true );

    wp_register_script( 'scroll-reveal',  get_template_directory_uri() . '/js/scrollreveal.min.js', false, false, true );
    wp_enqueue_script( 'scroll-reveal',  get_template_directory_uri() . '/js/scrollreveal.min.js', false, false, true  );

    wp_register_script( 'firetoss-js',  get_template_directory_uri() . '/js/firetoss.js', false, false, true );
    wp_enqueue_script( 'firetoss-js',  get_template_directory_uri() . '/js/firetoss.js', false, false, true );

}
add_action( 'wp_enqueue_scripts', 'custom_scripts' );

// Register Style
function custom_styles() {
// Add yours here following the below format
    wp_register_style( 'owl-styles',  get_template_directory_uri() . '/css/owl.carousel.css', false, false );
    wp_enqueue_style( 'owl-styles',  get_template_directory_uri() . '/css/owl.carousel.css', false, false );

    wp_register_style( 'mean-styles',  get_template_directory_uri() . '/css/meanmenu.css', false, false, 'all' );
    wp_enqueue_style( 'mean-styles',  get_template_directory_uri() . '/css/meanmenu.css', false, false, 'all' );


    wp_register_style( 'animate',  get_template_directory_uri() . '/css/animate.css', false, false, 'all' );
    wp_enqueue_style( 'animate',  get_template_directory_uri() . '/css/animate.css', false, false, 'all' );

}  
add_action( 'wp_enqueue_scripts', 'custom_styles' );

// woo theme support
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}



// gravity forms hide labels
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

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



// Register Custom Post Type
function custom_post_type_case()
{

    $labels = array(
        'name' => _x('Case Studies', 'Case Studies General Name', 'text_domain'),
        'singular_name' => _x('Case Study', 'Case Study Singular Name', 'text_domain'),
        'menu_name' => __('Case Studies', 'text_domain'),
        'name_admin_bar' => __('Case Study', 'text_domain'),
        'archives' => __('Item Archives', 'text_domain'),
        'attributes' => __('Item Attributes', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'all_items' => __('All Items', 'text_domain'),
        'add_new_item' => __('Add New Item', 'text_domain'),
        'add_new' => __('Add New', 'text_domain'),
        'new_item' => __('New Item', 'text_domain'),
        'edit_item' => __('Edit Item', 'text_domain'),
        'update_item' => __('Update Item', 'text_domain'),
        'view_item' => __('View Item', 'text_domain'),
        'view_items' => __('View Items', 'text_domain'),
        'search_items' => __('Search Item', 'text_domain'),
        'not_found' => __('Not found', 'text_domain'),
        'not_found_in_trash' => __('Not found in Trash', 'text_domain'),
        'featured_image' => __('Featured Image', 'text_domain'),
        'set_featured_image' => __('Set featured image', 'text_domain'),
        'remove_featured_image' => __('Remove featured image', 'text_domain'),
        'use_featured_image' => __('Use as featured image', 'text_domain'),
        'insert_into_item' => __('Insert into item', 'text_domain'),
        'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
        'filter_items_list' => __('Filter items list', 'text_domain'),
    );

    $args = array(
        'label' => __('Case Study', 'text_domain'),
        'description' => __('Case Study Description', 'text_domain'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
        'taxonomies' => array('taxonomy'),
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 10,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'menu_icon' => 'dashicons-groups',
    );
    register_post_type('case_study', $args);
}

add_action('init', 'custom_post_type_case', 0);

// Register Custom Taxonomy
function custom_taxonomy_cust_cat()
{

    $labels = array(
        'name' => _x('Case Study Categories', 'Case Study Category General Name', 'text_domain'),
        'singular_name' => _x('Case Study Category', 'Case Study Category Singular Name', 'text_domain'),
        'menu_name' => __('Case Study Category', 'text_domain'),
        'all_items' => __('All Items', 'text_domain'),
        'parent_item' => __('Parent Item', 'text_domain'),
        'parent_item_colon' => __('Parent Item:', 'text_domain'),
        'new_item_name' => __('New Item Name', 'text_domain'),
        'add_new_item' => __('Add New Item', 'text_domain'),
        'edit_item' => __('Edit Item', 'text_domain'),
        'update_item' => __('Update Item', 'text_domain'),
        'view_item' => __('View Item', 'text_domain'),
        'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
        'add_or_remove_items' => __('Add or remove items', 'text_domain'),
        'choose_from_most_used' => __('Choose from the most used', 'text_domain'),
        'popular_items' => __('Popular Items', 'text_domain'),
        'search_items' => __('Search Items', 'text_domain'),
        'not_found' => __('Not Found', 'text_domain'),
        'no_terms' => __('No items', 'text_domain'),
        'items_list' => __('Items list', 'text_domain'),
        'items_list_navigation' => __('Items list navigation', 'text_domain'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('taxonmy', array('case_study'), $args);

}



add_action('init', 'custom_taxonomy_cust_cat', 0);

//https://generatewp.com/post-type/

//https://generatewp.com/taxonomy/

//https://generatewp.com/register_script/

//https://generatewp.com/register_style/