<?php 

require_once('inc/wp-customize-image-reloaded.php');

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

	// Customize Header Image Settings  
	$wp_customize->add_section( 'header_text_styles' , array(
		'title'      => __('Header Text Styles','wptthemecustomizer'), 
		'priority'   => 30    
	) );
	$wp_customize->get_control('display_header_text')->section = 'header_text_styles';  
	$wp_customize->get_control('header_textcolor')->section = 'header_text_styles'; 
  $wp_customize->get_control('header_textcolor')->label = __('Site Title Color', 'wptthemecustomizer');
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage'; 

  // Add Custom Logo Settings
  $wp_customize->add_section( 'custom_logo' , array(
    'title'      => __('Change Your Logo','wptthemecustomizer'), 
    'panel'      => 'design_settings',
    'priority'   => 20    
  ) );  
  $wp_customize->add_setting(
      'wpt_logo',
      array(
          'default'         => get_template_directory_uri() . '/images/logo.png',
          'transport'       => 'postMessage'
      )
  );
  $wp_customize->add_control(
       new My_Customize_Image_Reloaded_Control(
           $wp_customize,
           'custom_logo',
           array(
               'label'      => __( 'Change Logo', 'wptthemecustomizer' ),
               'section'    => 'custom_logo',
               'settings'   => 'wpt_logo',
               'context'    => 'wpt-custom-logo' 
           )
       )
   ); 

  // Add Custom Footer Text
  $wp_customize->add_section( 'custom_footer_text' , array(
    'title'      => __('Change Footer Text','wptthemecustomizer'), 
    'panel'      => 'general_settings',
    'priority'   => 1000    
  ) );  
  $wp_customize->add_setting(
      'wpt_footer_text',
      array(
          'default'           => __( 'Custom footer text', 'wptthemecustomizer' ),
          'transport'         => 'postMessage',
          'sanitize_callback' => 'sanitize_text'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_footer_text',
            array(
                'label'          => __( 'Footer Text', 'wptthemecustomizer' ),
                'section'        => 'custom_footer_text',
                'settings'       => 'wpt_footer_text',
                'type'           => 'text'
            )
        )
   );   


  // Add H1 Style Settings
  $wp_customize->add_section( 'h1_styles' , array(
    'title'      => __('H1 Styles','wptthemecustomizer'), 
    'panel'      => 'design_settings',
    'priority'   => 100    
  ) );  
  $wp_customize->add_setting(
      'wpt_h1_color',
      array(
          'default'         => '#222222',
          'transport'       => 'postMessage'
      )
  );
  $wp_customize->add_control(
       new WP_Customize_Color_Control(
           $wp_customize,
           'custom_h1_color',
           array(
               'label'      => __( 'Color', 'wptthemecustomizer' ),
               'section'    => 'h1_styles',
               'settings'   => 'wpt_h1_color' 
           )
       )
   ); 
  $wp_customize->add_setting(
      'wpt_h1_font_size',
      array(
          'default'         => '24px',
          'transport'       => 'postMessage'
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_h1_font_size',
            array(
                'label'          => __( 'Font Size', 'wptthemecustomizer' ),
                'section'        => 'h1_styles',
                'settings'       => 'wpt_h1_font_size',
                'type'           => 'select',
                'choices'        => array(
                  '22'   => '22px',
                  '28'   => '28px',
                  '32'   => '32px',
                  '42'   => '42px'
                )
            )
        )       
   );   

  // Add Custom CSS Textfield
  $wp_customize->add_section( 'custom_css_field' , array(
    'title'      => __('Custom CSS','wptthemecustomizer'), 
    'panel'      => 'design_settings',
    'priority'   => 2000    
  ) );  
  $wp_customize->add_setting(
      'wpt_custom_css',
      array(          
          'sanitize_callback' => 'sanitize_textarea'          
      )
  );
  $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'custom_css',
            array(
                'label'          => __( 'Add custom CSS here', 'wptthemecustomizer' ),
                'section'        => 'custom_css_field',
                'settings'       => 'wpt_custom_css',
                'type'           => 'textarea'
            )
        )
   );

  // Create custom panels
  $wp_customize->add_panel( 'general_settings', array(
      'priority' => 10,
      'theme_supports' => '',
      'title' => __( 'General Settings', 'wptthemecustomizer' ),
      'description' => __( 'Controls the basic settings for the theme.', 'wptthemecustomizer' ),
  ) );
  $wp_customize->add_panel( 'design_settings', array(
      'priority' => 20,
      'theme_supports' => '',
      'title' => __( 'Design Settings', 'wptthemecustomizer' ),
      'description' => __( 'Controls the basic design settings for the theme.', 'wptthemecustomizer' ),
  ) ); 

  // Assign sections to panels
  $wp_customize->get_section('title_tagline')->panel = 'general_settings';      
  $wp_customize->get_section('nav')->panel = 'general_settings';
  $wp_customize->get_section('static_front_page')->panel = 'general_settings';
  $wp_customize->get_section('header_text_styles')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->panel = 'design_settings';
  $wp_customize->get_section('background_image')->priority = 1000;
  $wp_customize->get_section('header_image')->panel = 'design_settings';  

}
add_action( 'customize_register', 'wpt_register_theme_customizer' );


// Add theme support for Custom Header Image
$defaults = array(
  'default-image'          => get_template_directory_uri() . '/images/header.png', 
  'default-text-color'     => '#36b55c',
  'header-text'            => true,
  'uploads'                => true,
  'wp-head-callback'       => 'wpt_style_header'
);
add_theme_support( 'custom-header', $defaults );


// Callback function for updating header styles
function wpt_style_header() {

  $text_color = get_header_textcolor();
  
  ?>
  
  <style type="text/css">

  #header .site-title a {
    color: #<?php echo esc_attr( $text_color ); ?>;
  }
  
  <?php if(display_header_text() != true): ?>
  .site-title, .site-description {
    display: none;
  } 
  <?php endif; ?>
 
  h1 {
    font-size: <?php echo get_theme_mod('wpt_h1_font_size'); ?>;
  }
  h1 a {
    color: <?php echo get_theme_mod('wpt_h1_color'); ?>;
  }

  <?php if( get_theme_mod('wpt_custom_css') != '' ) {
    echo get_theme_mod('wpt_custom_css');
  } ?>

  </style>
  <?php 

}


// Add theme support for Custom Backgrounds
$defaults = array(
  'default-color' => '#efefef',
  'default-image' => get_template_directory_uri() . '/images/background.png',  
);
add_theme_support( 'custom-background', $defaults );


// Sanitize text 
function sanitize_text( $text ) {
    
    return sanitize_text_field( $text );

}

// Sanitize textarea 
function sanitize_textarea( $text ) {
    
    return esc_textarea( $text );

}


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


// Add theme menus
function wpt_theme_menus() {

  register_nav_menus(
    array(
      'main-menu'   => __( 'Main Menu', 'wptthemecustomizer' ),
    )
  );

}
add_action( 'init', 'wpt_theme_menus' );


// Add theme widgets
function wpt_create_widget( $name, $id, $description ) {

  register_sidebar(array(
    'name' => __( $name ),   
    'id' => $id, 
    'description' => __( $description ),
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  ));

}
wpt_create_widget( 'Main Widget', 'main_widget', 'For testing purposes' );
wpt_create_widget( 'Secondary Widget', 'secondary_widget', 'Also for testing purposes' );


?>