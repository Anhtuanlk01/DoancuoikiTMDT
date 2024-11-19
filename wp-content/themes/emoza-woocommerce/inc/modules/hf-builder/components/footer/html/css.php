<?php
/**
 * Footer Builder
 * HTML Component CSS Output
 * 
 * @package Emoza_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Text Alignment
$css .= Emoza_Custom_CSS::get_responsive_css( 
    'emoza_section_fb_component__html_text_align', 
    array( 'desktop' => 'left', 'tablet' => 'left', 'mobile' => 'left' ), 
    '.bhfb.bhfb-footer .bhfb-component-html',
    'text-align',
    '' 
);

// Visibility
$css .= Emoza_Custom_CSS::get_responsive_css( 
    'emoza_section_fb_component__html_visibility', 
    'visible', 
    '.bhfb.bhfb-footer .bhfb-builder-item.bhfb-component-html', 
    'display',
    ''
);

/**
 * Colors Default State
 */

// Text Color
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__html_text_color', '', '.bhfb.bhfb-footer .bhfb-component-html' );

// Links Color
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__html_link_color', '', '.bhfb.bhfb-footer .bhfb-component-html a' );

// Links Color Hover
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__html_link_color_hover', '', '.bhfb.bhfb-footer .bhfb-component-html a:hover' );

// Padding
$css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
    'emoza_section_fb_component__html_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.bhfb.bhfb-footer .bhfb-component-html', 
    'padding'
);

// Margin
$css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
    'emoza_section_fb_component__html_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.bhfb.bhfb-footer .bhfb-component-html', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound