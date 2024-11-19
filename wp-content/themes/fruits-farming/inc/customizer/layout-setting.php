<?php
/**
* Layouts Settings.
*
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();

// Layout Section.
$wp_customize->add_section( 'fruits_farming_layout_setting',
	array(
	'title'      => esc_html__( 'Global Layout Settings', 'fruits-farming' ),
	'priority'   => 20,
	'capability' => 'edit_theme_options',
	'panel'      => 'fruits_farming_theme_option_panel',
	)
);

$wp_customize->add_setting( 'fruits_farming_global_sidebar_layout',
    array(
    'default'           => $fruits_farming_default['fruits_farming_global_sidebar_layout'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'fruits_farming_sanitize_sidebar_option',
    )
);
$wp_customize->add_control( 'fruits_farming_global_sidebar_layout',
    array(
    'label'       => esc_html__( 'Global Sidebar Layout', 'fruits-farming' ),
    'section'     => 'fruits_farming_layout_setting',
    'type'        => 'select',
    'choices'     => array(
        'right-sidebar' => esc_html__( 'Right Sidebar', 'fruits-farming' ),
        'left-sidebar'  => esc_html__( 'Left Sidebar', 'fruits-farming' ),
        'no-sidebar'    => esc_html__( 'No Sidebar', 'fruits-farming' ),
        ),
    )
);
