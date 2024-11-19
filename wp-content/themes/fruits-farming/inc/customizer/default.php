<?php
/**
 * Default Values.
 *
 * @package Fruits Farming
 */

if ( ! function_exists( 'fruits_farming_get_default_theme_options' ) ) :
	function fruits_farming_get_default_theme_options() {

		$fruits_farming_defaults = array();

        // Header
        $fruits_farming_defaults['fruits_farming_header_layout_button']          =  esc_html__( 'Appointment', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_header_layout_button_url']      =  esc_url( '#', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_header_search']                 = 1;
        $fruits_farming_defaults['fruits_farming_theme_loader']                  = 0;
        $fruits_farming_defaults['fruits_farming_footer_column_layout']          = 3;
        $fruits_farming_defaults['fruits_farming_menu_font_size']                 = 14;
        $fruits_farming_defaults['fruits_farming_copyright_font_size']                 = 16;
        $fruits_farming_defaults['fruits_farming_breadcrumb_font_size']                 = 16;
        $fruits_farming_defaults['fruits_farming_excerpt_limit']                 = 10;
        $fruits_farming_defaults['fruits_farming_menu_text_transform']                 = 'capitalize';  
        $fruits_farming_defaults['fruits_farming_single_page_content_alignment']                 = 'left';
        $fruits_farming_defaults['fruits_farming_theme_pagination_options_alignment']                 = 'Center'; 
        $fruits_farming_defaults['fruits_farming_theme_breadcrumb_options_alignment']                 = 'Left'; 
        $fruits_farming_defaults['fruits_farming_per_columns']                 = 3;  
        $fruits_farming_defaults['fruits_farming_product_per_page']                 = 9;

        // Topbar
        $fruits_farming_defaults['fruits_farming_header_layout_phone_number']       =  esc_html__( '1234567890', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_header_layout_email_address']      =  esc_html__( 'freshfarm&fruits@example.com', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_header_layout_address']            =  esc_html__( '512,Beand Square, California', 'fruits-farming' );

        //Slider 
        $fruits_farming_defaults['fruits_farming_banner_right_image_1']                      = esc_url(get_template_directory_uri() . '/assets/images/banner-right.png');
        $fruits_farming_defaults['fruits_farming_slider_section_small_title']    =  esc_html__( 'Welcome to Fruits Store', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_slider_section_sub_title']      =  esc_html__( 'Shop Fresh, Eat Well One Stop Online Fruits Destination', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_slider_section_content']        =  esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_slider_section_button_url']     =  esc_url( '#', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_slider_section_button']         =  esc_html__( 'Read More', 'fruits-farming' );

	// Options.
        $fruits_farming_defaults['fruits_farming_logo_width_range']                 = 300;
        
        $fruits_farming_defaults['fruits_farming_global_sidebar_layout']	        = 'right-sidebar';
        $fruits_farming_defaults['fruits_farming_global_color']                 = '#5DB75B';
        
        $fruits_farming_defaults['fruits_farming_pagination_layout']                = 'numeric';
	$fruits_farming_defaults['fruits_farming_footer_column_layout'] 	        = 2;
	$fruits_farming_defaults['fruits_farming_footer_copyright_text'] 	        = esc_html__( 'All rights reserved.', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_twp_navigation_type']                  = 'theme-normal-navigation';
        $fruits_farming_defaults['fruits_farming_post_author']                          = 1;
        $fruits_farming_defaults['fruits_farming_post_date']                             = 1;
        $fruits_farming_defaults['fruits_farming_post_category']                	        = 1;
        $fruits_farming_defaults['fruits_farming_post_tags']                                  = 1;
        $fruits_farming_defaults['fruits_farming_floating_next_previous_nav']                 = 1;
        $fruits_farming_defaults['fruits_farming_header_slider']                              = 1;
        $fruits_farming_defaults['fruits_farming_category_section']                           = 1;
        $fruits_farming_defaults['fruits_farming_courses_category_section']                   = 1;
        $fruits_farming_defaults['fruits_farming_background_color']                           = '#fff';
        $fruits_farming_defaults['fruits_farming_display_archive_post_category']          = 1;
        $fruits_farming_defaults['fruits_farming_display_archive_post_sticky_post']       = 1;
        $fruits_farming_defaults['fruits_farming_display_archive_post_title']             = 1;
        $fruits_farming_defaults['fruits_farming_display_archive_post_content']           = 1;
        $fruits_farming_defaults['fruits_farming_display_archive_post_button']            = 1;

        //About Us
        $fruits_farming_defaults['fruits_farming_about_us_left_image']                      = esc_url(get_template_directory_uri() . '/assets/images/about-us.png');
        $fruits_farming_defaults['fruits_farming_header_about_us']                   = 1;
        $fruits_farming_defaults['fruits_farming_display_footer']            = 0;
        $fruits_farming_defaults['fruits_farming_footer_widget_title_alignment']                 = 'left'; 
        $fruits_farming_defaults['fruits_farming_show_hide_related_product']          = 1;
        $fruits_farming_defaults['fruits_farming_display_archive_post_image']            = 1;
        $fruits_farming_defaults['fruits_farming_about_us_section_title']            = esc_html__( 'About Us', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_about_us_section_content']          = esc_html__( 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content.', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_about_us_section_content_1']        = esc_html__( 'You through a personalized language journey, fostering a supportive learning environment.', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_about_us_section_image_title']      = esc_html__( 'ABOUT US', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_about_us_exprience_title']          = esc_html__( 'Our Mission', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_about_us_work_title']               = esc_html__( 'We prioritize your satisfaction and strive to make your shopping experience enjoyable.', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_about_us_button_text']              = esc_html__( 'Read More', 'fruits-farming' );
        $fruits_farming_defaults['fruits_farming_about_us_button_url']               =  esc_url( '#', 'fruits-farming' );

        $fruits_farming_defaults['fruits_farming_enable_to_the_top']                      = 1;
        $fruits_farming_defaults['fruits_farming_to_the_top_text']                      = esc_html__( 'To The Top', 'fruits-farming' );

	// Pass through filter.
	$fruits_farming_defaults = apply_filters( 'fruits_farming_filter_default_theme_options', $fruits_farming_defaults );

		return $fruits_farming_defaults;
	}
endif;