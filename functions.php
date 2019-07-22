<?php 

function wp_hook_head() {
	?>
	<meta charset="utf-8">
	<title><?php  // bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Le styles -->
	<link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <?php
}

function wp_bootstrap_jquery() {
	// Register the script like this for a theme:
	wp_register_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );
	// For either a plugin or a theme, you can then enqueue the script:
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
add_action( 'wp_enqueue_scripts', 'wp_bootstrap_jquery' );
add_action( 'widgets_init', 'register_main_sidebar' );

?>