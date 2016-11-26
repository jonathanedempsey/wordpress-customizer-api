<?php 

function wpt_register_theme_customizer( $wp_customize ) {

	//var_dump( $wp_customize );

	// Customize title and tagline sections and labels
	$wp_customize->get_section('title_tagline')->title = __('Site Name and Description', 'wptthemecustomizer');  
	$wp_customize->get_control('blogname')->label = __('Site Name', 'wptthemecustomizer');  
	$wp_customize->get_control('blogdescription')->label = __('Site Description', 'wptthemecustomizer');  
	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Customize the Front Page Settings
	$wp_customize->get_section('static_front_page')->title = __('Homepage Preferences', 'wptthemecustomizer');
	$wp_customize->get_section('static_front_page')->priority = 20;
	$wp_customize->get_control('show_on_front')->label = __('Choose Homepage Preference', 'wptthemecustomizer');  
	$wp_customize->get_control('page_on_front')->label = __('Select Homepage', 'wptthemecustomizer');  
	$wp_customize->get_control('page_for_posts')->label = __('Select Blog Homepage', 'wptthemecustomizer');  

	// Customize Background Settings
	$wp_customize->get_section('background_image')->title = __('Background Styles', 'wptthemecustomizer');  
	$wp_customize->get_control('background_color')->section = 'background_image'; 

}
add_action( 'customize_register', 'wpt_register_theme_customizer' );


// Add theme support for Custom Backgrounds
$defaults = array(
  'default-color' => '#efefef',
  'default-image' => get_template_directory_uri() . '/images/background.png',  
);
add_theme_support( 'custom-background', $defaults );


// Custom js for theme customizer
function wpt_customizer_js() {
  wp_enqueue_script(
    'wpt_theme_customizer',
    get_template_directory_uri() . '/js/theme-customizer.js',
    array( 'jquery', 'customize-preview' ),
    '',
    true
);
}
add_action( 'customize_preview_init', 'wpt_customizer_js' );


// Enqueue theme styles
function wpt_theme_styles() {

  wp_enqueue_style( 'main_css', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'wpt_theme_styles' );


?>