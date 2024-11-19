<?php
/**
* Header Options.
*
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();

// Header Section.
$wp_customize->add_section( 'fruits_farming_button_header_setting',
	array(
	'title'      => esc_html__( 'Header Settings', 'fruits-farming' ),
	'priority'   => 10,
	'capability' => 'edit_theme_options',
	'panel'      => 'fruits_farming_theme_option_panel',
	)
);

$wp_customize->add_setting('fruits_farming_header_search',
    array(
        'default' => $fruits_farming_default['fruits_farming_header_search'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_header_search',
    array(
        'label' => esc_html__('Enable Search', 'fruits-farming'),
        'section' => 'fruits_farming_button_header_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'fruits_farming_header_layout_phone_number',
    array(
    'default'           => $fruits_farming_default['fruits_farming_header_layout_phone_number'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_header_layout_phone_number',
    array(
    'label'    => esc_html__( 'Phone Number Text', 'fruits-farming' ),
    'section'  => 'fruits_farming_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_header_layout_email_address',
    array(
    'default'           => $fruits_farming_default['fruits_farming_header_layout_email_address'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_header_layout_email_address',
    array(
    'label'    => esc_html__( 'Email Address Text', 'fruits-farming' ),
    'section'  => 'fruits_farming_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_header_layout_address',
    array(
    'default'           => $fruits_farming_default['fruits_farming_header_layout_address'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_header_layout_address',
    array(
    'label'    => esc_html__( 'Location Text', 'fruits-farming' ),
    'section'  => 'fruits_farming_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_header_layout_button',
    array(
    'default'           => $fruits_farming_default['fruits_farming_header_layout_button'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_header_layout_button',
    array(
    'label'    => esc_html__( 'Header Button Text', 'fruits-farming' ),
    'section'  => 'fruits_farming_button_header_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_header_layout_button_url',
    array(
    'default'           => $fruits_farming_default['fruits_farming_header_layout_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_header_layout_button_url',
    array(
    'label'    => esc_html__( 'Header Button Url', 'fruits-farming' ),
    'section'  => 'fruits_farming_button_header_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting('fruits_farming_menu_font_size',
    array(
        'default'           => $fruits_farming_default['fruits_farming_menu_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_number_range',
    )
);
$wp_customize->add_control('fruits_farming_menu_font_size',
    array(
        'label'       => esc_html__('Menu Font Size', 'fruits-farming'),
        'section'     => 'fruits_farming_button_header_setting',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 30,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'fruits_farming_menu_text_transform',
    array(
    'default'           => $fruits_farming_default['fruits_farming_menu_text_transform'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'fruits_farming_sanitize_menu_transform',
    )
);
$wp_customize->add_control( 'fruits_farming_menu_text_transform',
    array(
    'label'       => esc_html__( 'Menu Text Transform', 'fruits-farming' ),
    'section'     => 'fruits_farming_button_header_setting',
    'type'        => 'select',
    'choices'     => array(
        'capitalize' => esc_html__( 'Capitalize', 'fruits-farming' ),
        'uppercase'  => esc_html__( 'Uppercase', 'fruits-farming' ),
        'lowercase'    => esc_html__( 'Lowercase', 'fruits-farming' ),
        ),
    )
);

$wp_customize->add_setting('fruits_farming_theme_loader',
    array(
        'default' => $fruits_farming_default['fruits_farming_theme_loader'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_theme_loader',
    array(
        'label' => esc_html__('Enable Preloader', 'fruits-farming'),
        'section' => 'fruits_farming_button_header_setting',
        'type' => 'checkbox',
    )
);
