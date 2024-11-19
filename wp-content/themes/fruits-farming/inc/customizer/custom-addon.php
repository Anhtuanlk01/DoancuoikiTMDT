<?php
/**
* Custom Addons.
*
* @package Fruits Farming
*/

$wp_customize->add_section( 'fruits_farming_theme_pagination_options',
    array(
    'title'      => esc_html__( 'Customizer Custom Settings', 'fruits-farming' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'fruits_farming_theme_addons_panel',
    )
);

$wp_customize->add_setting( 'fruits_farming_theme_pagination_options_alignment',
    array(
    'default'           => $fruits_farming_default['fruits_farming_theme_pagination_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'fruits_farming_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'fruits_farming_theme_pagination_options_alignment',
    array(
    'label'       => esc_html__( 'Pagination Alignment', 'fruits-farming' ),
    'section'     => 'fruits_farming_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'fruits-farming' ),
        'Right' => esc_html__( 'Right', 'fruits-farming' ),
        'Left'  => esc_html__( 'Left', 'fruits-farming' ),
        ),
    )
);

$wp_customize->add_setting( 'fruits_farming_theme_breadcrumb_options_alignment',
    array(
    'default'           => $fruits_farming_default['fruits_farming_theme_breadcrumb_options_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'fruits_farming_sanitize_pagination_meta',
    )
);
$wp_customize->add_control( 'fruits_farming_theme_breadcrumb_options_alignment',
    array(
    'label'       => esc_html__( 'Breadcrumb Alignment', 'fruits-farming' ),
    'section'     => 'fruits_farming_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'Center'    => esc_html__( 'Center', 'fruits-farming' ),
        'Right' => esc_html__( 'Right', 'fruits-farming' ),
        'Left'  => esc_html__( 'Left', 'fruits-farming' ),
        ),
    )
);

$wp_customize->add_setting('fruits_farming_breadcrumb_font_size',
    array(
        'default'           => $fruits_farming_default['fruits_farming_breadcrumb_font_size'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_number_range',
    )
);
$wp_customize->add_control('fruits_farming_breadcrumb_font_size',
    array(
        'label'       => esc_html__('Breadcrumb Font Size', 'fruits-farming'),
        'section'     => 'fruits_farming_theme_pagination_options',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);

$wp_customize->add_setting( 'fruits_farming_single_page_content_alignment',
    array(
    'default'           => $fruits_farming_default['fruits_farming_single_page_content_alignment'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'fruits_farming_sanitize_page_content_alignment',
    )
);
$wp_customize->add_control( 'fruits_farming_single_page_content_alignment',
    array(
    'label'       => esc_html__( 'Single Page Content Alignment', 'fruits-farming' ),
    'section'     => 'fruits_farming_theme_pagination_options',
    'type'        => 'select',
    'choices'     => array(
        'left' => esc_html__( 'Left', 'fruits-farming' ),
        'center'  => esc_html__( 'Center', 'fruits-farming' ),
        'right'    => esc_html__( 'Right', 'fruits-farming' ),
        ),
    )
);