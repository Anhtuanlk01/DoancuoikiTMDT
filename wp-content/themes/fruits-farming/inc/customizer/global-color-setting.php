<?php
/**
* Global Color Settings.
*
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'fruits_farming_global_color_setting',
	array(
	'title'      => esc_html__( 'Global Color Settings', 'fruits-farming' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'fruits_farming_theme_option_panel',
	)
);

$wp_customize->add_setting( 'fruits_farming_global_color',
    array(
    'default'           => '#5DB75B',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'fruits_farming_global_color',
    array(
        'label'      => esc_html__( 'Global Color', 'fruits-farming' ),
        'section'    => 'fruits_farming_global_color_setting',
        'settings'   => 'fruits_farming_global_color',
    ) ) 
);
