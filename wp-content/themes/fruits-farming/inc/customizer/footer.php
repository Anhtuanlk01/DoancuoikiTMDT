<?php
/**
* Footer Settings.
*
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();

$wp_customize->add_section( 'fruits_farming_footer_widget_area',
	array(
	'title'      => esc_html__( 'Footer Settings', 'fruits-farming' ),
	'priority'   => 200,
	'capability' => 'edit_theme_options',
	'panel'      => 'fruits_farming_theme_option_panel',
	)
);

$wp_customize->add_setting('fruits_farming_display_footer',
    array(
        'default' => $fruits_farming_default['fruits_farming_display_footer'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_display_footer',
    array(
        'label' => esc_html__('Enable Footer', 'fruits-farming'),
        'section' => 'fruits_farming_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'fruits_farming_footer_column_layout',
	array(
	'default'           => $fruits_farming_default['fruits_farming_footer_column_layout'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'fruits_farming_sanitize_select',
	)
);
$wp_customize->add_control( 'fruits_farming_footer_column_layout',
	array(
	'label'       => esc_html__( 'Footer Column Layout', 'fruits-farming' ),
	'section'     => 'fruits_farming_footer_widget_area',
	'type'        => 'select',
	'choices'               => array(
		'1' => esc_html__( 'One Column', 'fruits-farming' ),
		'2' => esc_html__( 'Two Column', 'fruits-farming' ),
		'3' => esc_html__( 'Three Column', 'fruits-farming' ),
	    ),
	)
);

$wp_customize->add_setting( 'fruits_farming_footer_widget_title_alignment',
        array(
        'default'           => $fruits_farming_default['fruits_farming_footer_widget_title_alignment'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_footer_widget_title_alignment',
        )
);
$wp_customize->add_control( 'fruits_farming_footer_widget_title_alignment',
    array(
    'label'       => esc_html__( 'Footer Widget Title Alignment', 'fruits-farming' ),
    'section'     => 'fruits_farming_footer_widget_area',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'fruits-farming' ),
        'center'  => esc_html__( 'Center', 'fruits-farming' ),
        'right'    => esc_html__( 'Right', 'fruits-farming' ),
        ),
    )
);

$wp_customize->add_setting( 'fruits_farming_footer_copyright_text',
	array(
	'default'           => $fruits_farming_default['fruits_farming_footer_copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'fruits_farming_footer_copyright_text',
	array(
	'label'    => esc_html__( 'Footer Copyright Text', 'fruits-farming' ),
	'section'  => 'fruits_farming_footer_widget_area',
	'type'     => 'text',
	)
);

$wp_customize->add_setting('fruits_farming_copyright_font_size',
    array(
        'default'           => $fruits_farming_default['fruits_farming_copyright_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_number_range',
    )
);
$wp_customize->add_control('fruits_farming_copyright_font_size',
    array(
        'label'       => esc_html__('Copyright Font Size', 'fruits-farming'),
        'section'     => 'fruits_farming_footer_widget_area',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 5,
           'max'   => 30,
           'step'   => 1,
    	),
    )
);

$wp_customize->add_setting( 'fruits_farming_footer_widget_background_color', array(
    'default' => '',
    'sanitize_callback' => 'sanitize_hex_color'
));
$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'fruits_farming_footer_widget_background_color', array(
    'label'     => __('Footer Widget Background Color', 'fruits-farming'),
    'description' => __('It will change the complete footer widget background color.', 'fruits-farming'),
    'section' => 'fruits_farming_footer_widget_area',
    'settings' => 'fruits_farming_footer_widget_background_color',
)));

$wp_customize->add_setting('footer_widget_background_image',array(
    'default'   => '',
    'sanitize_callback' => 'esc_url_raw',
));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'footer_widget_background_image',array(
    'label' => __('Footer Widget Background Image','fruits-farming'),
    'section' => 'fruits_farming_footer_widget_area'
)));

$wp_customize->add_setting('fruits_farming_enable_to_the_top',
    array(
        'default' => $fruits_farming_default['fruits_farming_enable_to_the_top'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_enable_to_the_top',
    array(
        'label' => esc_html__('Enable To The Top', 'fruits-farming'),
        'section' => 'fruits_farming_footer_widget_area',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'fruits_farming_to_the_top_text',
    array(
    'default'           => $fruits_farming_default['fruits_farming_to_the_top_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_to_the_top_text',
    array(
    'label'    => esc_html__( 'To The Top Text', 'fruits-farming' ),
    'section'  => 'fruits_farming_footer_widget_area',
    'type'     => 'text',
    )
);