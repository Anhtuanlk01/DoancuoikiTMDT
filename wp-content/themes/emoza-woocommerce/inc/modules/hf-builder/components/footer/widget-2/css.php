<?php
/**
 * Footer Builder
 * Widget 2 CSS Output
 * 
 * @package Emoza_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

// Visibility
$css .= Emoza_Custom_CSS::get_responsive_css( 
    'emoza_section_fb_component__widget2_visibility', 
    'visible', 
    '.bhfb.bhfb-footer .bhfb-builder-item.bhfb-component-widget2', 
    'display',
    ''
);

// Widget Title Color
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__widget2_title_color', '', '.bhfb-footer .bhfb-component-widget2 .widget-column .widget .widget-title' );

// Text Color
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__widget2_text_color', '', '.bhfb-footer .bhfb-component-widget2 .widget-column .widget' );

// Links Color
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__widget2_links_color', '', '.bhfb-footer .bhfb-component-widget2 .widget-column .widget a' );

// Links Color Hover
$css .= Emoza_Custom_CSS::get_color_css( 'emoza_section_fb_component__widget2_links_color_hover', '', '.bhfb-footer .bhfb-component-widget2 .widget-column .widget a:hover' );

// Padding
$css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
    'emoza_section_fb_component__widget2_padding',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.bhfb-footer .bhfb-component-widget2', 
    'padding'
);

// Margin
$css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
    'emoza_section_fb_component__widget2_margin',
    array(
        'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
    ), 
    '.bhfb-footer .bhfb-component-widget2', 
    'margin',
    true
);

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound