<?php
/**
* Typography Settings.
*
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'fruits_farming_typography_setting',
	array(
	'title'      => esc_html__( 'Typography Settings', 'fruits-farming' ),
	'priority'   => 21,
	'capability' => 'edit_theme_options',
	'panel'      => 'fruits_farming_theme_option_panel',
	)
);

// -----------------  Font array
$fruits_farming_fonts = array(
    'bad-script' => 'Bad Script',
    'bitter'     => 'Bitter',
    'cuprum'     => 'Cuprum',
    'exo-2'      => 'Exo 2',
    'jost'       => 'Jost',
    'oswald'     => 'Oswald',
    'outfit'     => 'Outfit',
    'NotoSans'     => 'NotoSans',
    'Poppins'     => 'Poppins',
);

 // -----------------  General text font
 $wp_customize->add_setting( 'fruits_farming_content_typography_font', array(
    'default'           => 'Poppins',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'fruits_farming_radio_sanitize',
) );
$wp_customize->add_control( 'fruits_farming_content_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General Content font', 'fruits-farming' ),
    'section'  => 'fruits_farming_typography_setting',
    'settings' => 'fruits_farming_content_typography_font',
    'choices'  => $fruits_farming_fonts,
) );

 // -----------------  General Heading font
$wp_customize->add_setting( 'fruits_farming_heading_typography_font', array(
    'default'           => 'NotoSans',
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'fruits_farming_radio_sanitize',
) );
$wp_customize->add_control( 'fruits_farming_heading_typography_font', array(
    'type'     => 'select',
    'label'    => esc_html__( 'General heading font', 'fruits-farming' ),
    'section'  => 'fruits_farming_typography_setting',
    'settings' => 'fruits_farming_heading_typography_font',
    'choices'  => $fruits_farming_fonts,
) );