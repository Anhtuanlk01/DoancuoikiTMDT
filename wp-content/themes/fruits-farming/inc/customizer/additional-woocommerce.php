<?php
/**
* Additional Woocommerce Settings.
*
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();

// Additional Woocommerce Section.
$wp_customize->add_section( 'fruits_farming_additional_woocommerce_options',
	array(
	'title'      => esc_html__( 'Additional Woocommerce Options', 'fruits-farming' ),
	'priority'   => 210,
	'capability' => 'edit_theme_options',
	'panel'      => 'fruits_farming_theme_option_panel',
	)
);

	$wp_customize->add_setting('fruits_farming_per_columns',
		array(
		'default'           => $fruits_farming_default['fruits_farming_per_columns'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fruits_farming_sanitize_number_range',
		)
	);
	$wp_customize->add_control('fruits_farming_per_columns',
		array(
		'label'       => esc_html__('Product Per Column', 'fruits-farming'),
		'section'     => 'fruits_farming_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 10,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('fruits_farming_product_per_page',
		array(
		'default'           => $fruits_farming_default['fruits_farming_product_per_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fruits_farming_sanitize_number_range',
		)
	);
	$wp_customize->add_control('fruits_farming_product_per_page',
		array(
		'label'       => esc_html__('Product Per Page', 'fruits-farming'),
		'section'     => 'fruits_farming_additional_woocommerce_options',
		'type'        => 'number',
		'input_attrs' => array(
		'min'   => 1,
		'max'   => 15,
		'step'   => 1,
		),
		)
	);

	$wp_customize->add_setting('fruits_farming_show_hide_related_product',
    array(
        'default' => $fruits_farming_default['fruits_farming_show_hide_related_product'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
	);
	$wp_customize->add_control('fruits_farming_show_hide_related_product',
	    array(
	        'label' => esc_html__('Enable Related Products', 'fruits-farming'),
	        'section' => 'fruits_farming_additional_woocommerce_options',
	        'type' => 'checkbox',
	    )
	);