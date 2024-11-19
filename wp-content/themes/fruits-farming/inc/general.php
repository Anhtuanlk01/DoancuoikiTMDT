<?php

function fruits_farming_enqueue_fonts() {
    $fruits_farming_default_font_content = 'Poppins';
    $fruits_farming_default_font_heading = 'NotoSans';

    $fruits_farming_font_content = esc_attr(get_theme_mod('fruits_farming_content_typography_font', $fruits_farming_default_font_content));
    $fruits_farming_font_heading = esc_attr(get_theme_mod('fruits_farming_heading_typography_font', $fruits_farming_default_font_heading));

    $fruits_farming_css = '';

    // Always enqueue main font
    $fruits_farming_css .= '
    :root {
        --font-main: ' . $fruits_farming_font_content . ', ' . (in_array($fruits_farming_font_content, ['bitter', 'NotoSans']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('fruits-farming-style-font-general', get_template_directory_uri() . '/fonts/' . $fruits_farming_font_content . '/font.css');

    // Always enqueue header font
    $fruits_farming_css .= '
    :root {
        --font-head: ' . $fruits_farming_font_heading . ', ' . (in_array($fruits_farming_font_heading, ['bitter', 'NotoSans']) ? 'serif' : 'sans-serif') . '!important;
    }';
    wp_enqueue_style('fruits-farming-style-font-h', get_template_directory_uri() . '/fonts/' . $fruits_farming_font_heading . '/font.css');

    // Add inline style
    wp_add_inline_style('fruits-farming-style-font-general', $fruits_farming_css);
}
add_action('wp_enqueue_scripts', 'fruits_farming_enqueue_fonts', 50);