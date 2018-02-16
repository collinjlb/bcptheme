<?php
// main_nav register its existence to wordpress
function register_menu() {
	register_nav_menu('primary', __('Primary'));
}
add_action('init', 'register_menu');

//Register Custom Navigation Walker to fully integrate bootstrap menus
	// require_once('/custom-functions/navwalkers/bootstrap-4-nav-walker.php');
	//
	// function example_load() {
	// 	wp_register_style( 'example-css', get_template_directory_uri() . '/css/example.css', false, NULL, 'all' );
	// 	wp_register_script( 'example-js', get_template_directory_uri() . '/js/example.js', array('jquery'), NULL, true );
	// 	wp_enqueue_style( 'example-css' );
	// 	wp_enqueue_script( 'example-js' );
// }
// add_action( 'wp_enqueue_scripts', 'example_load', 94 );

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page('Contact Links');
	acf_add_options_page();

}

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return ' - ';
}
add_filter('excerpt_more', 'new_excerpt_more');

function bootstrap() {
 	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', false, NULL, 'all' );
 	wp_enqueue_style( 'bootstrap-css' );

 	wp_register_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), NULL, true );
 	wp_enqueue_script( 'bootstrap-js' );
}
add_action( 'wp_enqueue_scripts', 'bootstrap', 99 );

function slick() {
 	wp_register_style( 'slick-css', get_template_directory_uri() . '/css/slick.css', false, NULL, 'all' );
 	wp_enqueue_style( 'slick-css' );
	wp_register_style( 'slick-theme-css', get_template_directory_uri() . '/css/slick-theme.css', false, NULL, 'all' );
 	wp_enqueue_style( 'slick-theme-css' );

 	wp_register_script( 'slick-js', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), NULL, true );
 	wp_enqueue_script( 'slick-js' );
}
add_action( 'wp_enqueue_scripts', 'slick', 99 );


function lightbox() {
 	wp_register_style( 'lightbox-css', get_template_directory_uri() . '/css/lightbox.css', false, NULL, 'all' );
 	wp_enqueue_style( 'lightbox-css' );

 	wp_register_script( 'lightbox-js', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), NULL, true );
 	wp_enqueue_script( 'lightbox-js' );
}
add_action( 'wp_enqueue_scripts', 'lightbox', 99 );

function my_scripts_enqueue() {
	// STYLESHEETS
	wp_register_style('theme-css', get_template_directory_uri() . '/css/style.css', false, NULL, 'all' );
	wp_register_style('plebian-css', get_template_directory_uri() . '/plebians-css/plebians-stylesheet.css', false, NULL, 'all' );
	// SCRIPTS
	wp_register_script( 'scripts-js', get_template_directory_uri() . '/js/scripts.js', array('jquery'), NULL, true );

	// STYLESHEETS
	wp_enqueue_style( 'theme-css' );
	wp_enqueue_style( 'plebian-css' );
	// SCRIPTS
	wp_enqueue_script( 'scripts-js' );
}
add_action( 'wp_enqueue_scripts', 'my_scripts_enqueue', 100 );

// Example of  creating different media library image sizes to be created on upload of imagery WxH
// add_image_size( 'home-image', 288, 480, true );

//Add support for post featured image_type_to_extension
add_theme_support( 'post-thumbnails' );

// custom widget functions
// include '/custom-functions/widgets/custom-widget-functions.php';
// custom blog functions
// include '/custom-functions/blog/custom-blog-functions.php';

// Register Sidebars
function custom_sidebars() {

	$args = array(
		'id'            => 'sidebarBlog',
		'class'         => 'sideBar',
		'name'          => __( 'Sidebar Blog 2', 'text_domain' ),
	);
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );

show_admin_bar(false);


//Exclude pages from WordPress Search
if (!is_admin()) {
function wpb_search_filter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}
add_filter('pre_get_posts','wpb_search_filter');
}
