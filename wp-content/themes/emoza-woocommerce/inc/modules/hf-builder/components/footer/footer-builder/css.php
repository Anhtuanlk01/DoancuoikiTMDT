<?php
/**
 * Header/Footer Builder
 * Header Builder CSS Output
 * 
 * @package Emoza_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Padding
$css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
    'emoza_section_fb_wrapper__footer_builder_padding', 
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.bhfb-footer', 
    'padding'
);

// Background Image
$fb_background_image = get_theme_mod( 'emoza_section_fb_wrapper__footer_builder_background_image', '' );
if( $fb_background_image ) {
    $image_url           = wp_get_attachment_image_url( $fb_background_image, 'full' );
    $background_size     = get_theme_mod( 'emoza_section_fb_wrapper__footer_builder_background_size', 'cover' );
    $background_position = get_theme_mod( 'emoza_section_fb_wrapper__footer_builder_background_position', 'center' );
    $background_repeat   = get_theme_mod( 'emoza_section_fb_wrapper__footer_builder_background_repeat', 'no-repeat' );

    $css .= '.bhfb-footer { background-image: url(' . esc_url( $image_url ) . '); }';
    $css .= Emoza_Custom_CSS::get_css( 
        'emoza_section_fb_wrapper__footer_builder_background_size', 
        'cover', 
        '.bhfb-footer', 
        'background-size', 
        '' 
    );
    $css .= Emoza_Custom_CSS::get_css( 
        'emoza_section_fb_wrapper__footer_builder_background_position', 
        'center', 
        '.bhfb-footer', 
        'background-position', 
        '' 
    );
    $css .= Emoza_Custom_CSS::get_css( 
        'emoza_section_fb_wrapper__footer_builder_background_repeat', 
        'no-repeat', 
        '.bhfb-footer', 
        'background-repeat', 
        '' 
    );
}

// Background Color
$css .= Emoza_Custom_CSS::get_background_color_css( 'emoza_section_fb_wrapper__footer_builder_background_color', '', '.bhfb-footer' );

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound