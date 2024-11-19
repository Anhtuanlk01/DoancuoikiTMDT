<?php
/**
* Header Banner Options.
*
* @package Fruits Farming
*/

$fruits_farming_default = fruits_farming_get_default_theme_options();
$fruits_farming_post_category_list = fruits_farming_post_category_list();

$wp_customize->add_section( 'fruits_farming_header_slider_setting',
    array(
    'title'      => esc_html__( 'Banner Settings', 'fruits-farming' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'fruits_farming_theme_home_pannel',
    )
);

$wp_customize->add_setting('fruits_farming_display_header_text',
    array(
        'default' => $fruits_farming_default['fruits_farming_header_slider'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_display_header_text',
    array(
        'label' => esc_html__('Enable / Disable Tagline', 'fruits-farming'),
        'section' => 'title_tagline',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_header_slider',
    array(
        'default' => $fruits_farming_default['fruits_farming_header_slider'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_header_slider',
    array(
        'label' => esc_html__('Enable Banner', 'fruits-farming'),
        'section' => 'fruits_farming_header_slider_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting( 'fruits_farming_slider_section_small_title',
    array(
    'default'           => $fruits_farming_default['fruits_farming_slider_section_small_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_slider_section_small_title',
    array(
    'label'    => esc_html__( 'Banner Sub Title', 'fruits-farming' ),
    'section'  => 'fruits_farming_header_slider_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_slider_section_sub_title',
    array(
    'default'           => $fruits_farming_default['fruits_farming_slider_section_sub_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_slider_section_sub_title',
    array(
    'label'    => esc_html__( 'Banner Title', 'fruits-farming' ),
    'section'  => 'fruits_farming_header_slider_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_slider_section_content',
    array(
    'default'           => $fruits_farming_default['fruits_farming_slider_section_content'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_slider_section_content',
    array(
    'label'    => esc_html__( 'Banner Content', 'fruits-farming' ),
    'section'  => 'fruits_farming_header_slider_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_slider_section_button',
    array(
    'default'           => $fruits_farming_default['fruits_farming_slider_section_button'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_slider_section_button',
    array(
    'label'    => esc_html__( 'Banner Button Url', 'fruits-farming' ),
    'section'  => 'fruits_farming_header_slider_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_slider_section_button_url',
    array(
    'default'           => $fruits_farming_default['fruits_farming_slider_section_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_slider_section_button_url',
    array(
    'label'    => esc_html__( 'Banner Button Url', 'fruits-farming' ),
    'section'  => 'fruits_farming_header_slider_setting',
    'type'     => 'url',
    )
);

$wp_customize->add_setting('fruits_farming_banner_right_image_1',
    array(
        'default'           => $fruits_farming_default['fruits_farming_banner_right_image_1'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'fruits_farming_banner_right_image_1',
        array(
            'label' => __('Banner Right Image 1','fruits-farming'),
            'section' => 'fruits_farming_header_slider_setting',
            'settings' => 'fruits_farming_banner_right_image_1',
        )
    )
);

// About Us Settings

$wp_customize->add_section( 'fruits_farming_about_us_setting',
    array(
    'title'      => esc_html__( 'About Us Settings', 'fruits-farming' ),
    'priority'   => 10,
    'capability' => 'edit_theme_options',
    'panel'      => 'fruits_farming_theme_home_pannel',
    )
);

$wp_customize->add_setting('fruits_farming_header_about_us',
    array(
        'default' => $fruits_farming_default['fruits_farming_header_about_us'],
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fruits_farming_sanitize_checkbox',
    )
);
$wp_customize->add_control('fruits_farming_header_about_us',
    array(
        'label' => esc_html__('Enable About Us', 'fruits-farming'),
        'section' => 'fruits_farming_about_us_setting',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting('fruits_farming_about_us_left_image',
    array(
        'default'           => $fruits_farming_default['fruits_farming_about_us_left_image'],
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control( $wp_customize,'fruits_farming_about_us_left_image',
        array(
            'label' => __('About Us Left Image ','fruits-farming'),
            'section' => 'fruits_farming_about_us_setting',
            'settings' => 'fruits_farming_about_us_left_image',
        )
    )
);

$wp_customize->add_setting( 'fruits_farming_about_us_section_image_title',
    array(
    'default'           => $fruits_farming_default['fruits_farming_about_us_section_image_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_about_us_section_image_title',
    array(
    'label'    => esc_html__( 'Left Image Heading', 'fruits-farming' ),
    'section'  => 'fruits_farming_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_about_us_section_title',
    array(
    'default'           => $fruits_farming_default['fruits_farming_about_us_section_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_about_us_section_title',
    array(
    'label'    => esc_html__( 'About Us Short Title', 'fruits-farming' ),
    'section'  => 'fruits_farming_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_about_us_section_content',
    array(
    'default'           => $fruits_farming_default['fruits_farming_about_us_section_content'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_about_us_section_content',
    array(
    'label'    => esc_html__( 'About Us Content 1', 'fruits-farming' ),
    'section'  => 'fruits_farming_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_about_us_section_content_1',
    array(
    'default'           => $fruits_farming_default['fruits_farming_about_us_section_content_1'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_about_us_section_content_1',
    array(
    'label'    => esc_html__( 'About Us Content 2', 'fruits-farming' ),
    'section'  => 'fruits_farming_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_about_us_exprience_title',
    array(
    'default'           => $fruits_farming_default['fruits_farming_about_us_exprience_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_about_us_exprience_title',
    array(
    'label'    => esc_html__( 'About Us Mission Heading', 'fruits-farming' ),
    'section'  => 'fruits_farming_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_about_us_work_title',
    array(
    'default'           => $fruits_farming_default['fruits_farming_about_us_work_title'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_about_us_work_title',
    array(
    'label'    => esc_html__( 'About Us Mission Content', 'fruits-farming' ),
    'section'  => 'fruits_farming_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_about_us_button_text',
    array(
    'default'           => $fruits_farming_default['fruits_farming_about_us_button_text'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_about_us_button_text',
    array(
    'label'    => esc_html__( 'Button Text', 'fruits-farming' ),
    'section'  => 'fruits_farming_about_us_setting',
    'type'     => 'text',
    )
);

$wp_customize->add_setting( 'fruits_farming_about_us_button_url',
    array(
    'default'           => $fruits_farming_default['fruits_farming_about_us_button_url'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control( 'fruits_farming_about_us_button_url',
    array(
    'label'    => esc_html__( 'Button Url', 'fruits-farming' ),
    'section'  => 'fruits_farming_about_us_setting',
    'type'     => 'url',
    )
);