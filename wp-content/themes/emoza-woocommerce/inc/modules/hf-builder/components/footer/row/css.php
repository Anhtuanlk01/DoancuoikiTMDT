<?php
/**
 * Footer Builder
 * Rows CSS Output
 * 
 * @package Emoza_Pro
 */

// @codingStandardsIgnoreStart WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound

$rows = array( 'above_footer_row', 'main_footer_row', 'below_footer_row' );
foreach( $rows as $row ) {

    // Height
    $default = Emoza_Header_Footer_Builder::get_row_height_default_customizer_value( $row );
    $css .= Emoza_Custom_CSS::get_responsive_css( 
        "emoza_footer_row__{$row}_height", 
        array( 'desktop' => $default, 'tablet' => $default, 'mobile' => $default ), 
        ".bhfb-$row",
        'min-height',
        'px' 
    );

    // Background Color
    $css .= Emoza_Custom_CSS::get_background_color_css( "emoza_footer_row__{$row}_background_color", '#f5f5f5', ".bhfb-$row" ); 

    // Background Image
    $background_image = get_theme_mod( "emoza_footer_row__{$row}_background_image", '' );
    if( $background_image ) {
        $image_url           = wp_get_attachment_image_url( $background_image, 'full' );
        $background_size     = get_theme_mod( "emoza_footer_row__{$row}_background_size", 'cover' );
        $background_position = get_theme_mod( "emoza_footer_row__{$row}_background_position", 'center' );
        $background_repeat   = get_theme_mod( "emoza_footer_row__{$row}_background_repeat", 'no-repeat' );

        $css .= ".bhfb-$row { background-image: url(" . esc_url( $image_url ) . "); }";
        $css .= Emoza_Custom_CSS::get_css( 
            "emoza_footer_row__{$row}_background_size", 
            'cover', 
            ".bhfb-$row", 
            'background-size', 
            '' 
        );
        $css .= Emoza_Custom_CSS::get_css( 
            "emoza_footer_row__{$row}_background_position", 
            'center', 
            ".bhfb-$row", 
            'background-position', 
            '' 
        );
        $css .= Emoza_Custom_CSS::get_css( 
            "emoza_footer_row__{$row}_background_repeat", 
            'no-repeat', 
            ".bhfb-$row", 
            'background-repeat', 
            '' 
        );
    }

    // Border Top
    $css .= Emoza_Custom_CSS::get_css( 
        "emoza_footer_row__{$row}_border_top_desktop",
        Emoza_Header_Footer_Builder::get_row_border_default_customizer_value( $row ), 
        ".bhfb-$row",
        array(
            array(
                'prop' => 'border-top-width',
                'unit' => 'px'
            )
        )
    );
    $css .= ".bhfb-$row { border-top-style: solid; }";
    $css .= Emoza_Custom_CSS::get_border_top_color_rgba_css( "emoza_footer_row__{$row}_border_top_color", '#EAEAEA', ".bhfb-$row", 0.1 );

    // Elements Spacing.
    $elements_spacing = get_theme_mod( "emoza_footer_row__{$row}_elements_spacing", '25' );
    $css .= ":root { --emoza_footer_row__{$row}_elements_spacing: {$elements_spacing}px; }";

    // Padding
    $css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
        "emoza_footer_row__{$row}_padding",
        array(
            'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
            'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
            'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        ), 
        ".bhfb-$row", 
        'padding'
    );

    // Margin
    $css .= Emoza_Custom_CSS::get_responsive_dimensions_css( 
        "emoza_footer_row__{$row}_margin",
        array(
            'desktop' => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
            'tablet'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
            'mobile'  => '{ "unit": "px", "linked": false, "top": "", "right": "", "bottom": "", "left": "" }',
        ), 
        ".bhfb-$row", 
        'margin'
    );

}

// @codingStandardsIgnoreEnd WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound