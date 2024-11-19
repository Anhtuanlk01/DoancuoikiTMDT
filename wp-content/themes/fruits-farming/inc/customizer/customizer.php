<?php
/**
 * Fruits Farming Theme Customizer
 * @package Fruits Farming
 */

/** Sanitize Functions. **/
	require get_template_directory() . '/inc/customizer/default.php';

if (!function_exists('fruits_farming_customize_register')) :

function fruits_farming_customize_register( $wp_customize ) {

	require get_template_directory() . '/inc/customizer/custom-classes.php';
	require get_template_directory() . '/inc/customizer/sanitize.php';
	require get_template_directory() . '/inc/customizer/header-button.php';
	require get_template_directory() . '/inc/customizer/colors.php';
	require get_template_directory() . '/inc/customizer/post.php';
	require get_template_directory() . '/inc/customizer/footer.php';
	require get_template_directory() . '/inc/customizer/layout-setting.php';
	require get_template_directory() . '/inc/customizer/typography.php';
	require get_template_directory() . '/inc/customizer/global-color-setting.php';
	require get_template_directory() . '/inc/customizer/homepage-content.php';
	require get_template_directory() . '/inc/customizer/custom-addon.php';
	require get_template_directory() . '/inc/customizer/additional-woocommerce.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->panel = 'fruits_farming_theme_colors_panel';
	$wp_customize->get_section( 'colors' )->title = esc_html__('Color Options','fruits-farming');
	$wp_customize->get_section( 'title_tagline' )->panel = 'fruits_farming_theme_general_settings';
	$wp_customize->get_section( 'header_image' )->panel = 'fruits_farming_theme_general_settings';
	$wp_customize->get_section( 'background_image' )->panel = 'fruits_farming_theme_general_settings';

	if ( isset( $wp_customize->selective_refresh ) ) {
		
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.header-titles .custom-logo-name',
			'render_callback' => 'fruits_farming_customize_partial_blogname',
		) );

		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'fruits_farming_customize_partial_blogdescription',
		) );

	}

	$wp_customize->add_panel( 'fruits_farming_theme_general_settings',
		array(
			'title'      => esc_html__( 'General Settings', 'fruits-farming' ),
			'priority'   => 10,
			'capability' => 'edit_theme_options',
		)
	);

	$wp_customize->add_panel( 'fruits_farming_theme_colors_panel',
		array(
			'title'      => esc_html__( 'Color Settings', 'fruits-farming' ),
			'priority'   => 15,
			'capability' => 'edit_theme_options',
		)
	);

	// Theme Options Panel.
	$wp_customize->add_panel( 'fruits_farming_theme_footer_option_panel',
		array(
			'title'      => esc_html__( 'Footer Setting', 'fruits-farming' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Template Options
	$wp_customize->add_panel( 'fruits_farming_theme_home_pannel',
		array(
			'title'      => esc_html__( 'Frontpage Settings', 'fruits-farming' ),
			'priority'   => 150,
			'capability' => 'edit_theme_options',
		)
	);

	// Addon Panel.
	$wp_customize->add_panel( 'fruits_farming_theme_addons_panel',
		array(
			'title'      => esc_html__( 'Theme Addons', 'fruits-farming' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	
	// Theme Options Panel.
	$wp_customize->add_panel( 'fruits_farming_theme_option_panel',
		array(
			'title'      => esc_html__( 'Theme Options', 'fruits-farming' ),
			'priority'   => 5,
			'capability' => 'edit_theme_options',
		)
	);
	$wp_customize->add_setting('fruits_farming_logo_width_range',
	    array(
	        'default'           => $fruits_farming_default['fruits_farming_logo_width_range'],
	        'capability'        => 'edit_theme_options',
	        'sanitize_callback' => 'fruits_farming_sanitize_number_range',
	    )
	);
	$wp_customize->add_control('fruits_farming_logo_width_range',
	    array(
	        'label'       => esc_html__('Logo width', 'fruits-farming'),
	        'description'       => esc_html__( 'Specify the range for logo size with a minimum of 200px and a maximum of 700px, in increments of 20px.', 'fruits-farming' ),
	        'section'     => 'title_tagline',
	        'type'        => 'range',
	        'input_attrs' => array(
	           'min'   => 200,
	           'max'   => 700,
	           'step'   => 20,
        	),
	    )
	);

	// Register custom section types.
	$wp_customize->register_section_type( 'Fruits_Farming_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Fruits_Farming_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Fruits Farming Pro', 'fruits-farming' ),
				'pro_text' => esc_html__( 'Upgrade To Pro', 'fruits-farming' ),
				'pro_url'  => esc_url('https://www.omegathemes.com/products/fruits-wordpress-theme'),
				'priority'  => 1,
			)
		)
	);
}

endif;
add_action( 'customize_register', 'fruits_farming_customize_register' );

/**
 * Customizer Enqueue scripts and styles.
 */

if (!function_exists('fruits_farming_customizer_scripts')) :

    function fruits_farming_customizer_scripts(){
    	
    	wp_enqueue_script('jquery-ui-button');
    	wp_enqueue_style('fruits-farming-customizer', get_template_directory_uri() . '/lib/custom/css/customizer.css');
        wp_enqueue_script('fruits-farming-customizer', get_template_directory_uri() . '/lib/custom/js/customizer.js', array('jquery','customize-controls'), '', 1);

        $ajax_nonce = wp_create_nonce('fruits_farming_ajax_nonce');
        wp_localize_script( 
		    'fruits-farming-customizer',
		    'fruits_farming_customizer',
		    array(
		        'ajax_url'   => esc_url( admin_url( 'admin-ajax.php' ) ),
		        'ajax_nonce' => $ajax_nonce,
		     )
		);
    }

endif;

add_action('customize_controls_enqueue_scripts', 'fruits_farming_customizer_scripts');
add_action('customize_controls_init', 'fruits_farming_customizer_scripts');

function fruits_farming_customize_preview_js() {
	wp_enqueue_script( 'fruits-farming-customizer-preview', get_template_directory_uri() . '/lib/custom/js/customizer-preview.js', array( 'customize-preview' ), '', true );
}
add_action( 'customize_preview_init', 'fruits_farming_customize_preview_js' );

if (!function_exists('fruits_farming_customize_partial_blogname')) :
	function fruits_farming_customize_partial_blogname() {
		bloginfo( 'name' );
	}
endif;

if (!function_exists('fruits_farming_customize_partial_blogdescription')) :
	function fruits_farming_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
endif;