<?php
/**
 * Active callback functions
 *
 * @package Emoza
 */

/**
 * Typography Adobe Fonts library
 */
function emoza_font_library_google() {
	$fonts_library = get_theme_mod( 'fonts_library', 'google' );

	if ( $fonts_library === 'google' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Typography Google Fonts library
 */
function emoza_font_library_adobe() {
	$adobe_typekit = Emoza_Modules::is_module_active( 'adobe-typekit' );
	$fonts_library = get_theme_mod( 'fonts_library', 'google' );

	if ( $adobe_typekit && $fonts_library === 'adobe' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Typography Custom Fonts library
 */
function emoza_font_library_custom() {
	$custom_fonts  = Emoza_Modules::is_module_active( 'custom-fonts' );
	$fonts_library = get_theme_mod( 'fonts_library', 'google' );

	if ( $custom_fonts && $fonts_library === 'custom' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Footer widgets divider
 */
function emoza_callback_footer_widgets_divider() {
    $divider = get_theme_mod( 'footer_widgets_divider' );

	if ( $divider ) {
		return true;
	} else {
		return false;
	}   
}

function emoza_callback_sidebar_archives() {
    $sidebar = get_theme_mod( 'sidebar_archives' );

	if ( $sidebar ) {
		return true;
	} else {
		return false;
	}       
}

/**
 * Single post layout
 */
function emoza_callback_single_post_layout() {
    $blog_single_layout = get_theme_mod( 'blog_single_layout', 'layout1' );

	if ( $blog_single_layout !== 'layout3' ) {
		return true;
	} else {
		return false;
	}       
}

/**
 * Single post sidebar
 */
function emoza_callback_sidebar_single_post() {
    $sidebar            = get_theme_mod( 'sidebar_single_post', 1 );
	$blog_single_layout = get_theme_mod( 'blog_single_layout', 'layout1' );

	if ( $sidebar && $blog_single_layout !== 'layout3' ) {
		return true;
	} else {
		return false;
	}       
}

/**
 * Single post author bio align
 */
function emoza_callback_single_post_show_author_box() {
    $enable = get_theme_mod( 'single_post_show_author_box', 0 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	}       
}

/**
 * Sale percentage
 */
function emoza_callback_sale_percentage() {
    $enable = get_theme_mod( 'sale_badge_percent', 0 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	}  
}

/**
 * Footer credits divider
 */
function emoza_callback_footer_credits_divider() {
    $divider = get_theme_mod( 'footer_credits_divider', 1 );

	if ( $divider ) {
		return true;
	} else {
		return false;
	}      
}

/**
 * Footer copyright alignment
 */
function emoza_callback_footer_copyright_alignment() {
    $layout = get_theme_mod( 'footer_copyright_layout', 'col2' );

	if ( $layout !== 'col2' ) {
		return true;
	} else {
		return false;
	}      
}

/**
 * Footer copyright elements
 */
function emoza_callback_footer_copyright_elements( $element, $check_columns_number = false ) {
	$elements = get_theme_mod( 'footer_copyright_elements', array( 'footer_credits', 'footer_social_profiles' ) );

	if ( in_array( $element, $elements ) ) {
		if( $check_columns_number ) {
			$cols = get_theme_mod( 'footer_copyright_layout', 'col2' );

			if( $cols === 'col2' ) {
				return true; 
			} else {
				return false;
			}
		}

		return true;
	} else {
		return false;
	}
}

/**
 * Enable custom palette
 */
function emoza_callback_custom_palette() {
    $enable = get_theme_mod( 'custom_palette_toggle', 0 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	}      
}

/**
 * Excerpt
 */
function emoza_callback_excerpt() {
    $enable = get_theme_mod( 'show_excerpt', 1 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	}   
}

/**
 * Scroll to top
 */
function emoza_callback_scrolltop() {
    $enable = get_theme_mod( 'enable_scrolltop', 1 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	}   
}

function emoza_callback_scrolltop_text() {
    $enable = get_theme_mod( 'enable_scrolltop', 1 );
	$type   = get_theme_mod( 'scrolltop_type', 'icon' );

	if ( $enable && 'text' === $type ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Read more
 */
function emoza_callback_read_more() {
    $enable = get_theme_mod( 'read_more_link', 0 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	}   
}

/**
 * Grid archives
 */
function emoza_callback_grid_archives() {
	$layout = get_theme_mod( 'blog_layout', 'layout3' );

	if ( 'layout3' === $layout || 'layout5' === $layout ) {
		return true;
	} else {
		return false;
	}
}

/**
 * List archives
 */
function emoza_callback_list_archives() {
	$layout = get_theme_mod( 'blog_layout', 'layout3' );

	if ( 'layout4' === $layout ) {
		return true;
	} else {
		return false;
	}
}

/**
 * List archives
 */
function emoza_callback_list_general_archives() {
	$layout = get_theme_mod( 'blog_layout', 'layout3' );

	if ( 'layout4' === $layout || 'layout6' === $layout ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Author avatar
 */
function emoza_callback_author_avatar() {
	$meta = get_theme_mod( 'archive_meta_elements', array( 'post_date' ) );

	if ( in_array( 'post_author', $meta ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Header layouts
 */
function emoza_callback_header_layout_1_2() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	
	if ( 'header_layout_1' === $layout || 'header_layout_2' === $layout || 'header_layout_6' === $layout ) {
		return true;
	} else { 
		return false;
	}
}

function emoza_callback_header_layout_3() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	
	if ( 'header_layout_3' === $layout ) {
		return true;
	} else { 
		return false;
	}
}

function emoza_callback_header_layout_4() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	
	if ( 'header_layout_4' === $layout ) {
		return true;
	} else { 
		return false;
	}
}


function emoza_callback_header_layout_5() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	
	if ( 'header_layout_5' === $layout ) {
		return true;
	} else { 
		return false;
	}
}

function emoza_callback_header_layout_not_1() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	
	if ( 'header_layout_1' !== $layout && 'header_layout_6' !== $layout && 'header_layout_7' !== $layout && 'header_layout_8' !== $layout ) {
		return true;
	} else { 
		return false;
	}
}

function emoza_callback_header_layout_not_6() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	
	if ( 'header_layout_6' !== $layout ) {
		return true;
	} else { 
		return false;
	}
}

function emoza_callback_header_layout_not_6_7_8() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	
	if ( ! in_array( $layout, array( 'header_layout_6', 'header_layout_7', 'header_layout_8' ) ) ) {
		return true;
	} else { 
		return false;
	}
}

function emoza_callback_header_layout_not_7_8() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	
	if ( ! in_array( $layout, array( 'header_layout_7', 'header_layout_8' ) ) ) {
		return true;
	} else { 
		return false;
	}
}

function emoza_callback_header_bottom() {
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );

	if ( 'header_layout_3' === $layout || 'header_layout_4' === $layout || 'header_layout_5' === $layout ) {
		return true;
	} else { 
		return false;
	}
}

function emoza_header_transparent_enabled() {
	$enabled = get_theme_mod( 'header_transparent', 0 );

	if ( $enabled ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Sticky header
 */
if( ! function_exists( 'emoza_sticky_header_enabled' ) ) {
	function emoza_sticky_header_enabled() {
		$enable = get_theme_mod( 'enable_sticky_header', 0 );

		if ( $enable ) {
			return true;
		} else {
			return false;
		} 
	}
}

function emoza_callback_sticky_header() {
	$header_layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	$enable        = get_theme_mod( 'enable_sticky_header', 0 );

	if ( $enable && $header_layout !== 'header_layout_6' ) {
		return true;
	} else {
		return false;
	}
}

function emoza_callback_sticky_header_logo() {
	$header_layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );
	$enable        = get_theme_mod( 'enable_sticky_header', 0 );

	if ( $enable && ! in_array( $header_layout, array( 'header_layout_3', 'header_layout_4', 'header_layout_5', 'header_layout_6' ) ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Header elements
 */
function emoza_callback_header_elements( $element ) {
	
	$layout = get_theme_mod( 'header_layout_desktop', 'header_layout_1' );

	switch ( $layout ) {
		case 'header_layout_1':
		case 'header_layout_2':
		case 'header_layout_6':
			$elements = get_theme_mod( 'header_components_l1', array( 'search' ) );

			if ( in_array( $element, $elements, true ) ) {
				return true;
			} else {
				return false;
			}

			break;

		case 'header_layout_3':
			$elements       = get_theme_mod( 'header_components_l3left' );
			$elements_right = get_theme_mod( 'header_components_l3right' );

			if ( in_array( $element, $elements, true ) || in_array( $element, $elements_right ) ) {
				return true;
			} else {
				return false;
			}

			break;  
			
		case 'header_layout_4':
			$elements           = get_theme_mod( 'header_components_l4top' );
			$elements_bottom    = get_theme_mod( 'header_components_l4bottom' );

			if ( in_array( $element, $elements ) || in_array( $element, $elements_bottom ) ) {
				return true;
			} else {
				return false;
			}

			break;  
			
		case 'header_layout_5':
			$elements           = get_theme_mod( 'header_components_l5topleft' );
			$elements_right     = get_theme_mod( 'header_components_l5topright' );
			$elements_bottom    = get_theme_mod( 'header_components_l5bottom' );

			if ( in_array( $element, $elements ) || in_array( $element, $elements_bottom ) || in_array( $element, $elements_right ) ) {
				return true;
			} else {
				return false;
			}

			break;

		case 'header_layout_7':
		case 'header_layout_8':
			$elements           = get_theme_mod( 'header_components_l7left' );
			$elements_right     = get_theme_mod( 'header_components_l7right' );

			if ( in_array( $element, $elements ) || in_array( $element, $elements_right ) ) {
				return true;
			} else {
				return false;
			}

			break;

		default:
			return false;

			break;          
	}
}

/**
 * Mobile Header Elements
 */
function emoza_callback_mobile_header_elements( $element ) {
	$default_components = emoza_get_default_header_components();

	$elements = get_theme_mod( 'header_components_mobile', $default_components[ 'mobile' ] );

	if ( in_array( $element, $elements ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Mobile Header Offcanvas Elements
 */
function emoza_callback_mobile_header_offcanvas_elements( $element ) {
	$default_components = emoza_get_default_header_components();

	$elements = get_theme_mod( 'header_components_offcanvas', $default_components[ 'mobile' ] );

	if ( in_array( $element, $elements ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Header Mini Cart
 */
function emoza_callback_header_show_minicart() {
	$enable = get_theme_mod( 'enable_header_cart', 1 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	} 
}

/**
 * Top bar elements
 */
function emoza_callback_topbar_elements( $element ) {
	
	$elements_left  = get_theme_mod( 'topbar_components_left' );
	$elements_right = get_theme_mod( 'topbar_components_right' );

	if ( in_array( $element, $elements_left ) || in_array( $element, $elements_right ) ) {
		return true;
	} else {
		return false;
	}
}

function emoza_callback_topbar_center_contents() {
	$elements_left  = get_theme_mod( 'topbar_components_left' );
	$elements_right = get_theme_mod( 'topbar_components_right' );   

	if ( empty( $elements_left ) || empty( $elements_right ) ) {
		return true;
	} else {
		return false;
	}   
}

/**
 * Shop Ajax Search
 */
function emoza_shop_search_ajax_is_enabled() {
	$enable = get_theme_mod( 'shop_search_enable_ajax', 0 );

	if ( $enable ) {
		return true;
	} else {
		return false;
	} 
}

/**
 * Single product elements
 */
function emoza_single_product_elements_show() {
	$single_product_gallery = get_theme_mod( 'single_product_gallery', 'gallery-default' );

	if ( 'gallery-full-width' !== $single_product_gallery ) {
		return true;
	} else {
		return false;
	} 
}

function emoza_callback_single_product_elements( $element ) {

	$elements = get_theme_mod( 'single_product_elements_order' );

	if ( in_array( $element, $elements ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Site Layout Default & Boxed & Padded
 */
function emoza_callback_site_layout_default_boxed_padded() {

	$site_layout = get_theme_mod( 'site_layout', 'default' );

	if ( in_array( $site_layout, array( 'default', 'boxed', 'padded' ) ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Site Layout Boxed
 */
function emoza_callback_site_layout_boxed() {

	$site_layout = get_theme_mod( 'site_layout', 'default' );

	if ( $site_layout === 'boxed' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Site Layout Padded
 */
function emoza_callback_site_layout_padded() {

	$site_layout = get_theme_mod( 'site_layout', 'default' );

	if ( $site_layout === 'padded' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Site Layout Fluid
 */
function emoza_callback_site_layout_fluid() {

	$site_layout = get_theme_mod( 'site_layout', 'default' );

	if ( $site_layout === 'fluid' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Site Layout Boxed & Padded
 */
function emoza_callback_site_layout_boxed_padded() {

	$site_layout = get_theme_mod( 'site_layout', 'default' );

	if ( in_array( $site_layout, array( 'boxed', 'padded' ) ) ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Button: Library Adobe & Custom Style
 */
function emoza_button_font_library_adobe_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'adobe-typekit' );
	$style   = get_theme_mod( 'button_font_style', 'custom' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'adobe' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Button: Library Custom & Custom Style
 */
function emoza_button_font_library_custom_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'custom-fonts' );
	$style   = get_theme_mod( 'button_font_style', 'custom' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'custom' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Button: Library Google & Custom Style
 */
function emoza_button_font_library_google_and_custom_style() {

	$style   = get_theme_mod( 'button_font_style', 'custom' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $style === 'custom' && $library === 'google' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Loop Post Title: Library Adobe & Custom Style
 */
function emoza_loop_post_title_font_library_adobe_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'adobe-typekit' );
	$style   = get_theme_mod( 'loop_post_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'adobe' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Loop Post Title: Library Custom & Custom Style
 */
function emoza_loop_post_title_font_library_custom_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'custom-fonts' );
	$style   = get_theme_mod( 'loop_post_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'custom' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Loop Post Title: Library Google & Custom Style
 */
function emoza_loop_post_title_font_library_google_and_custom_style() {

	$style   = get_theme_mod( 'loop_post_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $style === 'custom' && $library === 'google' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Single Post Title: Library Google & Custom Style
 */
function emoza_single_post_title_font_library_google_and_custom_style() {

	$style   = get_theme_mod( 'single_post_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $style === 'custom' && $library === 'google' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Single Post Title: Library Adobe & Custom Style
 */
function emoza_single_post_title_font_library_adobe_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'adobe-typekit' );
	$style   = get_theme_mod( 'single_post_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'adobe' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Single Post Title: Library Custom & Custom Style
 */
function emoza_single_post_title_font_library_custom_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'custom-fonts' );
	$style   = get_theme_mod( 'single_post_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'custom' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Single Product Title: Library Google & Custom Style
 */
function emoza_single_product_title_font_library_google_and_custom_style() {

	$style   = get_theme_mod( 'single_product_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $style === 'custom' && $library === 'google' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Single Product Title: Library Adobe & Custom Style
 */
function emoza_single_product_title_font_library_adobe_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'adobe-typekit' );
	$style   = get_theme_mod( 'single_product_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'adobe' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Single Product Title: Library Custom & Custom Style
 */
function emoza_single_product_title_font_library_custom_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'custom-fonts' );
	$style   = get_theme_mod( 'single_product_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'custom' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Shop Product Title: Library Google & Custom Style
 */
function emoza_shop_product_title_font_library_google_and_custom_style() {

	$style   = get_theme_mod( 'shop_product_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $style === 'custom' && $library === 'google' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Shop Product Title: Library Adobe & Custom Style
 */
function emoza_shop_product_title_font_library_adobe_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'adobe-typekit' );
	$style   = get_theme_mod( 'shop_product_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'adobe' ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Shop Product Title: Library Custom & Custom Style
 */
function emoza_shop_product_title_font_library_custom_and_custom_style() {

	$enable  = Emoza_Modules::is_module_active( 'custom-fonts' );
	$style   = get_theme_mod( 'shop_product_title_font_style', 'heading' );
	$library = get_theme_mod( 'fonts_library', 'google' );

	if ( $enable && $style === 'custom' && $library === 'custom' ) {
		return true;
	} else {
		return false;
	}
}