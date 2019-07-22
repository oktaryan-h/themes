<?php 

function wp_hook_head() {
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
}

function wp_hook_styles_and_scripts() {
	// Register the script like this for a theme:

	wp_register_style( 'default_stylesheet', get_stylesheet_uri() );

	wp_register_script('ie9-script', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), '1.0');
	wp_script_add_data('ie9-script', 'conditional', 'lt IE 9');

	wp_register_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );

	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_style('default_stylesheet');

	wp_enqueue_script('ie9-script');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');
}

function register_main_sidebar() {
	register_sidebar( array(
		'id' => 'main-sidebar',
		'name' => 'Main',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	));
}

function wp_hook_features() {
	add_theme_support( 'title-tag' );
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'footer-menu' => __( 'Footer Menu' ),
		)
	);

}

add_action( 'wp_head', 'wp_hook_head' );
add_action( 'after_setup_theme', 'wp_hook_features' );
add_action( 'wp_enqueue_scripts', 'wp_hook_styles_and_scripts' );
add_action( 'widgets_init', 'register_main_sidebar' );

?>