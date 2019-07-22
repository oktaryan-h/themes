<?php 

class TM_Theme_Features {

	function hook_head() {
		?>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php
	}

	function hook_styles_and_scripts() {

		wp_register_style( 'default_stylesheet', get_stylesheet_uri() );

		wp_register_script('ie9-script', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), '1.0');
		wp_script_add_data('ie9-script', 'conditional', 'lt IE 9');

		wp_register_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) );

		wp_enqueue_style('default_stylesheet');

		wp_enqueue_script('ie9-script');
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap');
	}

	function hook_features() {
		add_theme_support( 'title-tag' );
		register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu' ),
				'footer-menu' => __( 'Footer Menu' ),
			)
		);

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
}

$tm_theme = new TM_Theme_Features;

add_action( 'wp_head', array( $tm_theme, 'hook_head' ) );
add_action( 'after_setup_theme', array( $tm_theme, 'hook_features' ) );
add_action( 'wp_enqueue_scripts', array( $tm_theme, 'hook_styles_and_scripts' ) );
add_action( 'widgets_init', array( $tm_theme, 'register_main_sidebar' ) );

?>