<?php
/**
 * Footer Builder
 * Copyright/credits Component CSS Output
 * 
 * @package Emoza_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Emoza_Custom_CSS::get_responsive_css( 
    'emoza_section_fb_component__copyright_visibility', 
    'visible', 
    '.bhfb.bhfb-footer .bhfb-builder-item.bhfb-component-copyright',
    'display',
    ''
);

// Text Color
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__copyright_text_color', '', '.bhfb .emoza-credits' );

// Links Color
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__copyright_links_color', '', '.bhfb .emoza-credits a' );

// Links Color Hover
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__copyright_links_color_hover', '', '.bhfb .emoza-credits a:hover' );

// Padding
$css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
    'emoza_section_fb_component__copyright_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.bhfb-component-copyright', 
    'padding'
);

// Margin
$css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
    'emoza_section_fb_component__copyright_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.bhfb-component-copyright', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound