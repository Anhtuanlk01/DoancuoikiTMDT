<?php
/**
* Posts Settings.
*
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();

// Single Post Section.
$wp_customize->add_section( 'fruits_farming_single_posts_settings',
    array(
    'title'      => esc_html__( 'Single Meta Information Settings', 'fruits-farming' ),
    'priority'   => 35,
    'capability' => 'edit_theme_options',
    'panel'      => 'fruits_farming_theme_option_panel',
    )
);

$wp_customize->add_setting('fruits_farming_post_author',
    array(
        'default' => $fruits_farming_default['fruits_farming_post_author'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_post_author',
    array(
        'label' => esc_html__('Enable Posts Author', 'fruits-farming'),
        'section' => 'fruits_farming_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_post_date',
    array(
        'default' => $fruits_farming_default['fruits_farming_post_date'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_post_date',
    array(
        'label' => esc_html__('Enable Posts Date', 'fruits-farming'),
        'section' => 'fruits_farming_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_post_category',
    array(
        'default' => $fruits_farming_default['fruits_farming_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'fruits-farming'),
        'section' => 'fruits_farming_single_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_post_tags',
    array(
        'default' => $fruits_farming_default['fruits_farming_post_tags'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_post_tags',
    array(
        'label' => esc_html__('Enable Posts Tags', 'fruits-farming'),
        'section' => 'fruits_farming_single_posts_settings',
        'type' => 'checkbox',
    )
);

// Archive Post Section.
$wp_customize->add_section( 'fruits_farming_posts_settings',
    array(
    'title'      => esc_html__( 'Archive Meta Information Settings', 'fruits-farming' ),
    'priority'   => 36,
    'capability' => 'edit_theme_options',
    'panel'      => 'fruits_farming_theme_option_panel',
    )
);

$wp_customize->add_setting('fruits_farming_display_archive_post_sticky_post',
    array(
        'default' => $fruits_farming_default['fruits_farming_display_archive_post_sticky_post'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_display_archive_post_sticky_post',
    array(
        'label' => esc_html__('Enable sticky Post', 'fruits-farming'),
        'section' => 'fruits_farming_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_display_archive_post_image',
    array(
        'default' => $fruits_farming_default['fruits_farming_display_archive_post_image'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_display_archive_post_image',
    array(
        'label' => esc_html__('Enable Posts Image', 'fruits-farming'),
        'section' => 'fruits_farming_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_display_archive_post_category',
    array(
        'default' => $fruits_farming_default['fruits_farming_display_archive_post_category'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_display_archive_post_category',
    array(
        'label' => esc_html__('Enable Posts Category', 'fruits-farming'),
        'section' => 'fruits_farming_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_display_archive_post_title',
    array(
        'default' => $fruits_farming_default['fruits_farming_display_archive_post_title'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_display_archive_post_title',
    array(
        'label' => esc_html__('Enable Posts Title', 'fruits-farming'),
        'section' => 'fruits_farming_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_display_archive_post_content',
    array(
        'default' => $fruits_farming_default['fruits_farming_display_archive_post_content'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_display_archive_post_content',
    array(
        'label' => esc_html__('Enable Posts Content', 'fruits-farming'),
        'section' => 'fruits_farming_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_display_archive_post_button',
    array(
        'default' => $fruits_farming_default['fruits_farming_display_archive_post_button'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_display_archive_post_button',
    array(
        'label' => esc_html__('Enable Posts Button', 'fruits-farming'),
        'section' => 'fruits_farming_posts_settings',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_excerpt_limit',
    array(
        'default'           => $fruits_farming_default['fruits_farming_excerpt_limit'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_number_range',
    )
);
$wp_customize->add_control('fruits_farming_excerpt_limit',
    array(
        'label'       => esc_html__('Blog Post Excerpt limit', 'fruits-farming'),
        'section'     => 'fruits_farming_posts_settings',
        'type'        => 'number',
        'input_attrs' => array(
           'min'   => 1,
           'max'   => 45,
           'step'   => 1,
        ),
    )
);