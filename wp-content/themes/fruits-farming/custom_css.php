<?php

$fruits_farming_custom_css = "";

$fruits_farming_theme_pagination_options_alignment = get_theme_mod('fruits_farming_theme_pagination_options_alignment', 'Center');
	if ($fruits_farming_theme_pagination_options_alignment == 'Center') {
	    $fruits_farming_custom_css .= '.pagination{';
	    $fruits_farming_custom_css .= 'text-align: center;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_theme_pagination_options_alignment == 'Right') {
	    $fruits_farming_custom_css .= '.pagination{';
	    $fruits_farming_custom_css .= 'text-align: Right;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_theme_pagination_options_alignment == 'Left') {
	    $fruits_farming_custom_css .= '.pagination{';
	    $fruits_farming_custom_css .= 'text-align: Left;';
	    $fruits_farming_custom_css .= '}';
	}

	 $fruits_farming_theme_breadcrumb_options_alignment = get_theme_mod('fruits_farming_theme_breadcrumb_options_alignment', 'Left');
	if ($fruits_farming_theme_breadcrumb_options_alignment == 'Center') {
	    $fruits_farming_custom_css .= '.breadcrumbs ul{';
	    $fruits_farming_custom_css .= 'text-align: center !important;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_theme_breadcrumb_options_alignment == 'Right') {
	    $fruits_farming_custom_css .= '.breadcrumbs ul{';
	    $fruits_farming_custom_css .= 'text-align: Right !important;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_theme_breadcrumb_options_alignment == 'Left') {
	    $fruits_farming_custom_css .= '.breadcrumbs ul{';
	    $fruits_farming_custom_css .= 'text-align: Left !important;';
	    $fruits_farming_custom_css .= '}';
	}

	$fruits_farming_menu_text_transform = get_theme_mod('fruits_farming_menu_text_transform', 'Capitalize');
	if ($fruits_farming_menu_text_transform == 'Capitalize') {
	    $fruits_farming_custom_css .= '.site-navigation .primary-menu > li a{';
	    $fruits_farming_custom_css .= 'text-transform: Capitalize !important;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_menu_text_transform == 'uppercase') {
	    $fruits_farming_custom_css .= '.site-navigation .primary-menu > li a{';
	    $fruits_farming_custom_css .= 'text-transform: uppercase !important;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_menu_text_transform == 'lowercase') {
	    $fruits_farming_custom_css .= '.site-navigation .primary-menu > li a{';
	    $fruits_farming_custom_css .= 'text-transform: lowercase !important;';
	    $fruits_farming_custom_css .= '}';
	}

	$fruits_farming_single_page_content_alignment = get_theme_mod('fruits_farming_single_page_content_alignment', 'left');
	if ($fruits_farming_single_page_content_alignment == 'left') {
	    $fruits_farming_custom_css .= '#single-page .type-page{';
	    $fruits_farming_custom_css .= 'text-align: left !important;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_single_page_content_alignment == 'center') {
	    $fruits_farming_custom_css .= '#single-page .type-page{';
	    $fruits_farming_custom_css .= 'text-align: center !important;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_single_page_content_alignment == 'right') {
	    $fruits_farming_custom_css .= '#single-page .type-page{';
	    $fruits_farming_custom_css .= 'text-align: right !important;';
	    $fruits_farming_custom_css .= '}';
	}

	$fruits_farming_footer_widget_title_alignment = get_theme_mod('fruits_farming_footer_widget_title_alignment', 'left');
	if ($fruits_farming_footer_widget_title_alignment == 'left') {
	    $fruits_farming_custom_css .= 'h2.widget-title{';
	    $fruits_farming_custom_css .= 'text-align: left !important;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_footer_widget_title_alignment == 'center') {
	    $fruits_farming_custom_css .= 'h2.widget-title{';
	    $fruits_farming_custom_css .= 'text-align: center !important;';
	    $fruits_farming_custom_css .= '}';
	} else if ($fruits_farming_footer_widget_title_alignment == 'right') {
	    $fruits_farming_custom_css .= 'h2.widget-title{';
	    $fruits_farming_custom_css .= 'text-align: right !important;';
	    $fruits_farming_custom_css .= '}';
	}

    $fruits_farming_show_hide_related_product = get_theme_mod('fruits_farming_show_hide_related_product',true);
    if($fruits_farming_show_hide_related_product != true){
        $fruits_farming_custom_css .='.related.products{';
            $fruits_farming_custom_css .='display: none;';
        $fruits_farming_custom_css .='}';
    }

    /*-------------------- Global First Color -------------------*/

	$fruits_farming_global_color = get_theme_mod('fruits_farming_global_color', '#5DB75B'); // Add a fallback if the color isn't set

	if ($fruits_farming_global_color) {
		$fruits_farming_custom_css .= ':root {';
		$fruits_farming_custom_css .= '--global-color: ' . esc_attr($fruits_farming_global_color) . ';';
		$fruits_farming_custom_css .= '}';
	}
	
	/*-------------------- Content Font -------------------*/

	$fruits_farming_content_typography_font = get_theme_mod('fruits_farming_content_typography_font', 'Poppins'); // Add a fallback if the color isn't set

	if ($fruits_farming_content_typography_font) {
		$fruits_farming_custom_css .= ':root {';
		$fruits_farming_custom_css .= '--font-main: ' . esc_attr($fruits_farming_content_typography_font) . ';';
		$fruits_farming_custom_css .= '}';
	}

	/*-------------------- Heading Font -------------------*/

	$fruits_farming_heading_typography_font = get_theme_mod('fruits_farming_heading_typography_font', 'NotoSans'); // Add a fallback if the color isn't set

	if ($fruits_farming_heading_typography_font) {
		$fruits_farming_custom_css .= ':root {';
		$fruits_farming_custom_css .= '--font-head: ' . esc_attr($fruits_farming_heading_typography_font) . ';';
		$fruits_farming_custom_css .= '}';
	}