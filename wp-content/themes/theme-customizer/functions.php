<?php 

function wpt_register_theme_customizer( $wp_customize ) {

	//var_dump( $wp_customize );

}
add_action( 'customize_register', 'wpt_register_theme_customizer' );

// Enqueue theme styles
function wpt_theme_styles() {

  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );


?>