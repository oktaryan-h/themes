<?php 

function wp_bootstrap_jquery() {
	// Register the script like this for a theme:
	wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
	wp_enqueue_script( 'custom-script' );
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

add_action( 'wp_enqueue_scripts', 'wp_bootstrap_jquery' );
add_action( 'widgets_init', 'register_main_sidebar' );

?>