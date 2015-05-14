<?php
/**
 * Roots initial setup and constants
 */
function roots_setup() {
	// Make theme available for translation
	// Community translations can be found at https://github.com/roots/roots-translations
	load_theme_textdomain('roots', get_template_directory() . '/lang');

	// Register wp_nav_menu() menus
	// http://codex.wordpress.org/Function_Reference/register_nav_menus
	register_nav_menus(array(
		'attraction_map_navigation' => 'Attraction Navigation',
		'region_map_navigation' => 'Region Navigation',
		'attraction_map_hover' => 'Attraction Map Hover Navigation',
		'primary_navigation' => __('Primary Navigation', 'roots')
	));

	// Add post thumbnails
	// http://codex.wordpress.org/Post_Thumbnails
	// http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
	// http://codex.wordpress.org/Function_Reference/add_image_size
	add_theme_support('post-thumbnails');
	add_image_size('owl_thumb-large', 570, 570, true);
	add_image_size('owl_thumb-medium', 400, 400, true);
	add_image_size('owl_thumb-small', 320, 320, true);
	add_image_size('popup', 122, 122, true);

	@ini_set( 'upload_max_size' , '64M' );
	@ini_set( 'post_max_size', '64M');
	@ini_set( 'max_execution_time', '300' );
	// Add post formats
	// http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));

	// Add HTML5 markup for captions
	// http://codex.wordpress.org/Function_Reference/add_theme_support#HTML5
	add_theme_support('html5', array('caption'));

	// Tell the TinyMCE editor to use a custom stylesheet
	add_editor_style('/assets/css/editor-style.css');
}
add_action('after_setup_theme', 'roots_setup');

/**
 * Register sidebars
 */
function roots_widgets_init() {
	register_sidebar(array(
		'name'          => __('Primary', 'roots'),
		'id'            => 'sidebar-primary',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));

	register_sidebar( array(
		'name'          => __('Blog Sidebar', 'roots'),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	) );

	register_sidebar(array(
		'name'          => __('Footer', 'roots'),
		'id'            => 'sidebar-footer',
		'before_widget' => '<section class="widget %1$s %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	));
}
add_action('widgets_init', 'roots_widgets_init');
