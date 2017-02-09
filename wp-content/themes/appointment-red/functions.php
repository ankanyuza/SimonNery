<?php
add_action( 'wp_enqueue_scripts', 'appointment_red_theme_css',999);
function appointment_red_theme_css() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'theme-menu', get_template_directory_uri() . '/css/theme-menu.css' );
	wp_enqueue_style( 'default-css', get_stylesheet_directory_uri()."/css/default.css" );
	wp_enqueue_style( 'element-style', get_template_directory_uri() . '/css/element.css' );
	wp_enqueue_style( 'media-responsive' ,get_template_directory_uri() . '/css/media-responsive.css');
	wp_dequeue_style('appointment-default',get_template_directory_uri() .'/css/default.css');
	wp_enqueue_style( 'child-style',get_stylesheet_directory_uri() . '/style.css', array( $parent_style ),wp_get_theme()->get('Version'));
	wp_enqueue_style( 'child-menu', get_stylesheet_directory_uri()."/css/theme-menu.css" ); 
}

/*
	 * Let WordPress manage the document title.
	 */
	function appointment_red_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'appointment_red_setup' );


add_filter('nimble_portfolio_lightbox_link_atts', 'handle_nimble_portfolio_lightbox_link_atts', 20, 2);
function handle_nimble_portfolio_lightbox_link_atts($link_atts, $item) {
$link_atts['href'] = $item->getData('nimble-portfolio-url');
unset($link_atts['rel']);
return $link_atts;
}

add_filter('nimble_portfolio_filter_all', 'remove_nimble_portfolio_all_filter');
function remove_nimble_portfolio_all_filter($filter_tag) { return ""; }
?>