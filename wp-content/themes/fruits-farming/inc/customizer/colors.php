<?php
/**
* Color Settings.
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();

$wp_customize->add_setting( 'fruits_farming_default_text_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'fruits_farming_default_text_color',
    array(
        'label'      => esc_html__( 'Text Color', 'fruits-farming' ),
        'section'    => 'colors',
        'settings'   => 'fruits_farming_default_text_color',
    ) ) 
);

$wp_customize->add_setting( 'fruits_farming_border_color',
    array(
    'default'           => '',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control( 
    new WP_Customize_Color_Control( 
    $wp_customize, 
    'fruits_farming_border_color',
    array(
        'label'      => esc_html__( 'Border Color', 'fruits-farming' ),
        'section'    => 'colors',
        'settings'   => 'fruits_farming_border_color',
    ) ) 
);