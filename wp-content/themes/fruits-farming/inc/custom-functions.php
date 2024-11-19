<?php
/**
 * Custom Functions.
 *
 * @package Fruits Farming
 */

if( !function_exists( 'fruits_farming_fonts_url' ) ) :

    //Google Fonts URL
    function fruits_farming_fonts_url(){

        $font_families = array(
            'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
            'Noto+Sans:ital,wght@0,100..900;1,100..900',
        );

        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $font_families ),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2' );

        return esc_url_raw($fonts_url);
    }

endif;

if ( ! function_exists( 'fruits_farming_sub_menu_toggle_button' ) ) :

    function fruits_farming_sub_menu_toggle_button( $args, $item, $depth ) {

        // Add sub menu toggles to the main menu with toggles
        if ( $args->theme_location == 'fruits-farming-primary-menu' && isset( $args->show_toggles ) ) {
            
            // Wrap the menu item link contents in a div, used for positioning
            $args->before = '<div class="submenu-wrapper">';
            $args->after  = '';

            // Add a toggle to items with children
            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $toggle_target_string = '.menu-item.menu-item-' . $item->ID . ' > .sub-menu';

                // Add the sub menu toggle
                $args->after .= '<button type="button" class="theme-aria-button submenu-toggle" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="250" aria-expanded="false"><span class="btn__content" tabindex="-1"><span class="screen-reader-text">' . esc_html__( 'Show sub menu', 'fruits-farming' ) . '</span>' . fruits_farming_get_theme_svg( 'chevron-down' ) . '</span></button>';

            }

            // Close the wrapper
            $args->after .= '</div><!-- .submenu-wrapper -->';
            // Add sub menu icons to the main menu without toggles (the fallback menu)

        }elseif( $args->theme_location == 'fruits-farming-primary-menu' ) {

            if ( in_array( 'menu-item-has-children', $item->classes ) ) {

                $args->before = '<div class="link-icon-wrapper">';
                $args->after  = fruits_farming_get_theme_svg( 'chevron-down' ) . '</div>';

            } else {

                $args->before = '';
                $args->after  = '';

            }

        }

        return $args;

    }

endif;

add_filter( 'nav_menu_item_args', 'fruits_farming_sub_menu_toggle_button', 10, 3 );

if ( ! function_exists( 'fruits_farming_the_theme_svg' ) ):
    
    function fruits_farming_the_theme_svg( $svg_name, $return = false ) {

        if( $return ){

            return fruits_farming_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in fruits_farming_get_theme_svg();.

        }else{

            echo fruits_farming_get_theme_svg( $svg_name ); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in fruits_farming_get_theme_svg();.

        }
    }

endif;

if ( ! function_exists( 'fruits_farming_get_theme_svg' ) ):

    function fruits_farming_get_theme_svg( $svg_name ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            Fruits_Farming_SVG_Icons::get_svg( $svg_name ),
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
                'polyline' => array(
                    'fill'      => true,
                    'points'    => true,
                ),
                'line' => array(
                    'fill'      => true,
                    'x1'      => true,
                    'x2' => true,
                    'y1'    => true,
                    'y2' => true,
                ),
            )
        );
        if ( ! $svg ) {
            return false;
        }
        return $svg;

    }

endif;

if( !function_exists( 'fruits_farming_post_category_list' ) ) :

    // Post Category List.
    function fruits_farming_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( '-- Select Category --','fruits-farming' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if( !function_exists('fruits_farming_single_post_navigation') ):

    function fruits_farming_single_post_navigation(){

        $fruits_farming_footer_column_layout = fruits_farming_get_default_theme_options();
        $fruits_farming_twp_navigation_type = esc_attr( get_post_meta( get_the_ID(), 'fruits_farming_twp_disable_ajax_load_next_post', true ) );
        $current_id = '';
        $article_wrap_class = '';
        global $post;
        $current_id = $post->ID;
        if( $fruits_farming_twp_navigation_type == '' || $fruits_farming_twp_navigation_type == 'global-layout' ){
            $fruits_farming_twp_navigation_type = get_theme_mod('fruits_farming_twp_navigation_type', $fruits_farming_footer_column_layout['fruits_farming_twp_navigation_type']);
        }

        if( $fruits_farming_twp_navigation_type != 'no-navigation' && 'post' === get_post_type() ){

            if( $fruits_farming_twp_navigation_type == 'theme-normal-navigation' ){ ?>

                <div class="navigation-wrapper">
                    <?php
                    // Previous/next post navigation.
                    the_post_navigation(array(
                        'prev_text' => '<span class="arrow" aria-hidden="true">' . fruits_farming_the_theme_svg('arrow-left',$return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Previous post:', 'fruits-farming') . '</span><span class="post-title">%title</span>',
                        'next_text' => '<span class="arrow" aria-hidden="true">' . fruits_farming_the_theme_svg('arrow-right',$return = true ) . '</span><span class="screen-reader-text">' . esc_html__('Next post:', 'fruits-farming') . '</span><span class="post-title">%title</span>',
                    )); ?>
                </div>
                <?php

            }else{

                $next_post = get_next_post();
                if( isset( $next_post->ID ) ){

                    $next_post_id = $next_post->ID;
                    echo '<div loop-count="1" next-post="' . absint( $next_post_id ) . '" class="twp-single-infinity"></div>';

                }
            }

        }

    }

endif;

add_action( 'fruits_farming_navigation_action','fruits_farming_single_post_navigation',30 );

if( !function_exists('fruits_farming_content_offcanvas') ):

    // Offcanvas Contents
    function fruits_farming_content_offcanvas(){ ?>

        <div id="offcanvas-menu">
            <div class="offcanvas-wraper">
                <div class="close-offcanvas-menu">
                    <div class="offcanvas-close">
                        <a href="javascript:void(0)" class="skip-link-menu-start"></a>
                        <button type="button" class="button-offcanvas-close">
                            <span class="offcanvas-close-label">
                                <?php echo esc_html('Close', 'fruits-farming'); ?>
                            </span>
                        </button>
                    </div>
                </div>
                <div id="primary-nav-offcanvas" class="offcanvas-item offcanvas-main-navigation">
                    <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'fruits-farming'); ?>" role="navigation">
                        <ul class="primary-menu theme-menu">
                            <?php
                            if (has_nav_menu('fruits-farming-primary-menu')) {
                                wp_nav_menu(
                                    array(
                                        'container' => '',
                                        'items_wrap' => '%3$s',
                                        'theme_location' => 'fruits-farming-primary-menu',
                                        'show_toggles' => true,
                                    )
                                );
                            }else{

                                wp_list_pages(
                                    array(
                                        'match_menu_classes' => true,
                                        'show_sub_menu_icons' => true,
                                        'title_li' => false,
                                        'show_toggles' => true,
                                        'walker' => new Fruits_Farming_Walker_Page(),
                                    )
                                );
                            }
                            ?>
                        </ul>
                    </nav><!-- .primary-menu-wrapper -->
                </div>
                <a href="javascript:void(0)" class="skip-link-menu-end"></a>
            </div>
        </div>

    <?php
    }

endif;

add_action( 'fruits_farming_before_footer_content_action','fruits_farming_content_offcanvas',30 );

if( !function_exists('fruits_farming_footer_content_widget') ):

    function fruits_farming_footer_content_widget(){

        $fruits_farming_default = fruits_farming_get_default_theme_options();
        
            $fruits_farming_footer_column_layout = absint(get_theme_mod('fruits_farming_footer_column_layout', $fruits_farming_default['fruits_farming_footer_column_layout']));
            $fruits_farming_footer_sidebar_class = 12;
            if($fruits_farming_footer_column_layout == 2) {
                $fruits_farming_footer_sidebar_class = 6;
            }
            if($fruits_farming_footer_column_layout == 3) {
                $fruits_farming_footer_sidebar_class = 4;
            }
            ?>
           
            <?php if ( get_theme_mod('fruits_farming_display_footer', false) == true ) : ?>
                <div class="footer-widgetarea">
                    <div class="wrapper">
                        <div class="column-row">

                            <?php for ($i=0; $i < $fruits_farming_footer_column_layout; $i++) {
                                ?>
                                <div class="column <?php echo 'column-' . absint($fruits_farming_footer_sidebar_class); ?> column-sm-12">
                                    <?php dynamic_sidebar('fruits-farming-footer-widget-' . $i); ?>
                                </div>
                           <?php } ?>

                        </div>
                    </div>
                </div>
           <?php endif; ?> 

        <?php

    }

endif;

add_action( 'fruits_farming_footer_content_action','fruits_farming_footer_content_widget',10 );

if( !function_exists('fruits_farming_footer_content_info') ):

    /**
     * Footer Copyright Area
    **/
    function fruits_farming_footer_content_info(){

        $fruits_farming_footer_column_layout = fruits_farming_get_default_theme_options(); ?>
        <div class="site-info">
            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-9">
                        <div class="footer-credits">
                            <div class="footer-copyright">
                                <?php
                                $fruits_farming_footer_copyright_text = wp_kses_post( get_theme_mod( 'fruits_farming_footer_copyright_text', $fruits_farming_footer_column_layout['fruits_farming_footer_copyright_text'] ) );
                                    echo esc_html( $fruits_farming_footer_copyright_text );
                                    echo '<br>';
                                    echo esc_html__('Theme: ', 'fruits-farming') . '<a href="' . esc_url('https://www.omegathemes.com/products/free-farming-wordpress-theme') . '" title="' . esc_attr__('Fruits Farming', 'fruits-farming') . '" target="_blank"><span>' . esc_html__('Fruits Farming', 'fruits-farming') . '</span></a>' . esc_html__(' By ', 'fruits-farming') . '  <span>' . esc_html__('OMEGA ', 'fruits-farming') . '</span>';
                                    echo esc_html__('Powered by ', 'fruits-farming') . '<a href="' . esc_url('https://wordpress.org') . '" title="' . esc_attr__('WordPress', 'fruits-farming') . '" target="_blank"><span>' . esc_html__('WordPress.', 'fruits-farming') . '</span></a>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="column column-3 align-text-right">
                        <a class="to-the-top" href="#site-header">
                            <span class="to-the-top-long">
                                <?php if ( get_theme_mod('fruits_farming_enable_to_the_top', true) == true ) : ?>
                                    <?php
                                    $fruits_farming_to_the_top_text = get_theme_mod( 'fruits_farming_to_the_top_text', __( 'To the Top', 'fruits-farming' ) );
                                    printf( 
                                        wp_kses( 
                                            /* translators: %s is the arrow icon markup */
                                            '%s %s', 
                                            array( 'span' => array( 'class' => array(), 'aria-hidden' => array() ) ) 
                                        ), 
                                        esc_html( $fruits_farming_to_the_top_text ),
                                        '<span class="arrow" aria-hidden="true">&uarr;</span>' 
                                    );
                                    ?>
                                <?php endif; ?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }

endif;

add_action( 'fruits_farming_footer_content_action','fruits_farming_footer_content_info',20 );


if( !function_exists( 'fruits_farming_main_slider' ) ) :

    function fruits_farming_main_slider(){

        $fruits_farming_defaults = fruits_farming_get_default_theme_options();
        $fruits_farming_header_slider = get_theme_mod( 'fruits_farming_header_slider', $fruits_farming_defaults['fruits_farming_header_slider'] );

        $fruits_farming_banner_right_image_1 = esc_url( get_theme_mod( 'fruits_farming_banner_right_image_1',
        $fruits_farming_defaults['fruits_farming_banner_right_image_1'] ) );

        $fruits_farming_banner_right_image_2 = get_theme_mod( 'fruits_farming_banner_right_image_2' );

        $fruits_farming_banner_right_image_3 = get_theme_mod( 'fruits_farming_banner_right_image_3' );

        $fruits_farming_slider_section_small_title = esc_html( get_theme_mod( 'fruits_farming_slider_section_small_title',
        $fruits_farming_defaults['fruits_farming_slider_section_small_title'] ) );

        $fruits_farming_slider_section_sub_title = esc_html( get_theme_mod( 'fruits_farming_slider_section_sub_title',
        $fruits_farming_defaults['fruits_farming_slider_section_sub_title'] ) );

        $fruits_farming_slider_section_content = esc_html( get_theme_mod( 'fruits_farming_slider_section_content',
        $fruits_farming_defaults['fruits_farming_slider_section_content'] ) );

        $fruits_farming_slider_section_button_url = esc_url( get_theme_mod( 'fruits_farming_slider_section_button_url',
        $fruits_farming_defaults['fruits_farming_slider_section_button_url'] ) );

        $fruits_farming_slider_section_button = esc_html( get_theme_mod( 'fruits_farming_slider_section_button',
        $fruits_farming_defaults['fruits_farming_slider_section_button'] ) );

        if( $fruits_farming_header_slider ){ ?>
                <div id="site-content" class="slider-box">
                    <div class="wrapper-flex">
                        <div class="slider-main">
                            <div class="left-box">
                                <div class="slide-heading-main">
                                    <h4 class="slide-title">
                                        <?php if( $fruits_farming_slider_section_small_title ){ ?>
                                            <?php echo esc_html($fruits_farming_slider_section_small_title) ?>
                                        <?php } ?>
                                    </h4>
                                    <h3 class="slide-sub-title">
                                        <?php if( $fruits_farming_slider_section_sub_title ){ ?>
                                            <?php echo esc_html($fruits_farming_slider_section_sub_title) ?>
                                        <?php } ?>
                                    </h3>
                                    <p class="slide-content">
                                        <?php if( $fruits_farming_slider_section_content ){ ?>
                                            <?php echo esc_html($fruits_farming_slider_section_content) ?>
                                        <?php } ?>
                                    </p>
                                    <?php if( $fruits_farming_slider_section_button_url || $fruits_farming_slider_section_button ){ ?>
                                        <span class="slide-button">
                                            <a href="<?php echo $fruits_farming_slider_section_button_url  ?>"><?php echo esc_html($fruits_farming_slider_section_button) ?></a>
                                        </span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="right-box">
                                <div class="image-main-box">
                                    <div class="imagebox1">
                                        <div class="entry-thumbnail">
                                            <?php if( $fruits_farming_banner_right_image_1 ){ ?>
                                                <img src="<?php echo esc_url( $fruits_farming_banner_right_image_1 ); ?>" alt="Banner Right Image">
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
    }

endif;

    if( !function_exists( 'fruits_farming_about_us_section' ) ) :

    function fruits_farming_about_us_section(){ 

        $fruits_farming_footer_column_layout = fruits_farming_get_default_theme_options();

        $fruits_farming_header_about_us = get_theme_mod( 'fruits_farming_header_about_us', 
        $fruits_farming_footer_column_layout['fruits_farming_header_about_us'] );

        $fruits_farming_about_us_section_title = esc_html( get_theme_mod( 'fruits_farming_about_us_section_title',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_section_title'] ) );

        $fruits_farming_about_us_section_content = esc_html( get_theme_mod( 'fruits_farming_about_us_section_content',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_section_content'] ) );

        $fruits_farming_about_us_section_content_1 = esc_html( get_theme_mod( 'fruits_farming_about_us_section_content_1',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_section_content_1'] ) );

        $fruits_farming_about_us_section_image_title = esc_html( get_theme_mod( 'fruits_farming_about_us_section_image_title',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_section_image_title'] ) );

        $fruits_farming_about_us_left_image = esc_url( get_theme_mod( 'fruits_farming_about_us_left_image',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_left_image'] ) );

        $fruits_farming_about_us_exprience_title = esc_html( get_theme_mod( 'fruits_farming_about_us_exprience_title',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_exprience_title'] ) );

        $fruits_farming_about_us_work_title = esc_html( get_theme_mod( 'fruits_farming_about_us_work_title',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_work_title'] ) );

        $fruits_farming_about_us_button_text = esc_html( get_theme_mod( 'fruits_farming_about_us_button_text',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_button_text'] ) );

        $fruits_farming_about_us_button_url = esc_url( get_theme_mod( 'fruits_farming_about_us_button_url',
        $fruits_farming_footer_column_layout['fruits_farming_about_us_button_url'] ) );
        
        if( $fruits_farming_header_about_us ){ ?>
            <div class="most-read">
                <div class="wrapper">
                    <div class="most-read-div">
                        <?php if( $fruits_farming_about_us_left_image ){ ?>
                        <div class="most-sidebar-box">
                                <img src="<?php echo esc_url( $fruits_farming_about_us_left_image ); ?>" alt="About Us Left Image">
                                <?php if( $fruits_farming_about_us_section_image_title ){ ?>
                                    <h4 class="list-title">
                                        <?php echo esc_html($fruits_farming_about_us_section_image_title) ?>
                                    </h4>
                                <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="blog-main-box">
                            <div class="list-heading-main">
                                <h4 class="list-title">
                                    <?php if( $fruits_farming_about_us_section_title ){ ?>
                                        <?php echo esc_html($fruits_farming_about_us_section_title) ?>
                                    <?php } ?>
                                </h4>
                                <p class="list-content">
                                    <?php if( $fruits_farming_about_us_section_content ){ ?>
                                        <?php echo esc_html($fruits_farming_about_us_section_content) ?>
                                    <?php } ?>
                                </p>
                                <p class="list-content1">
                                    <?php if( $fruits_farming_about_us_section_content_1 ){ ?>
                                        <?php echo esc_html($fruits_farming_about_us_section_content_1) ?>
                                    <?php } ?>
                                </p>
                            </div>
                            <div class="header-wrapper about-box">
                                <div class="theme-header-areas header-areas-left about-single-box">
                                    <div class="icon-box">
                                        <span class="about-icon"><svg xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 384 512"><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg></span>
                                    </div>
                                    <div class="header-areas-box">
                                        <?php if( $fruits_farming_about_us_exprience_title ){ ?>
                                            <h6><?php echo esc_html( $fruits_farming_about_us_exprience_title ); ?></h6>
                                        <?php } ?>
                                        <?php if( $fruits_farming_about_us_work_title ){ ?>
                                            <p><?php echo esc_html( $fruits_farming_about_us_work_title ); ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="about-btn">
                                <?php if( $fruits_farming_about_us_button_text || $fruits_farming_about_us_button_url ){ ?>
                                    <p><a href="<?php echo esc_url( $fruits_farming_about_us_button_url ); ?>"><?php echo esc_html( $fruits_farming_about_us_button_text ); ?></a></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    <?php }

endif;

if (!function_exists('fruits_farming_post_format_icon')):

    // Post Format Icon.
    function fruits_farming_post_format_icon() {

        $fruits_farming_format = get_post_format(get_the_ID()) ?: 'standard';
        $fruits_farming_icon = '';
        $fruits_farming_title = '';
        if( $fruits_farming_format == 'video' ){
            $fruits_farming_icon = fruits_farming_get_theme_svg( 'video' );
            $fruits_farming_title = esc_html__('Video','fruits-farming');
        }elseif( $fruits_farming_format == 'audio' ){
            $fruits_farming_icon = fruits_farming_get_theme_svg( 'audio' );
            $fruits_farming_title = esc_html__('Audio','fruits-farming');
        }elseif( $fruits_farming_format == 'gallery' ){
            $fruits_farming_icon = fruits_farming_get_theme_svg( 'gallery' );
            $fruits_farming_title = esc_html__('Gallery','fruits-farming');
        }elseif( $fruits_farming_format == 'quote' ){
            $fruits_farming_icon = fruits_farming_get_theme_svg( 'quote' );
            $fruits_farming_title = esc_html__('Quote','fruits-farming');
        }elseif( $fruits_farming_format == 'image' ){
            $fruits_farming_icon = fruits_farming_get_theme_svg( 'image' );
            $fruits_farming_title = esc_html__('Image','fruits-farming');
        }
        
        if (!empty($fruits_farming_icon)) { ?>
            <div class="theme-post-format">
                <span class="post-format-icom"><?php echo fruits_farming_svg_escape($fruits_farming_icon); ?></span>
                <?php if( $fruits_farming_title ){ echo '<span class="post-format-label">'.esc_html( $fruits_farming_title ).'</span>'; } ?>
            </div>
        <?php }
    }

endif;

if ( ! function_exists( 'fruits_farming_svg_escape' ) ):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function fruits_farming_svg_escape( $input ) {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            $input,
            array(
                'svg'     => array(
                    'class'       => true,
                    'xmlns'       => true,
                    'width'       => true,
                    'height'      => true,
                    'viewbox'     => true,
                    'aria-hidden' => true,
                    'role'        => true,
                    'focusable'   => true,
                ),
                'path'    => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'd'         => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill'      => true,
                    'fill-rule' => true,
                    'points'    => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if ( ! $svg ) {
            return false;
        }

        return $svg;

    }

endif;

if( !function_exists( 'fruits_farming_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function fruits_farming_sanitize_sidebar_option_meta( $input ){

        $fruits_farming_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$fruits_farming_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'fruits_farming_sanitize_pagination_meta' ) ) :

    // Sidebar Option Sanitize.
    function fruits_farming_sanitize_pagination_meta( $input ){

        $fruits_farming_metabox_options = array( 'Center','Right','Left');
        if( in_array( $input,$fruits_farming_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'fruits_farming_sanitize_menu_transform' ) ) :

    // Sidebar Option Sanitize.
    function fruits_farming_sanitize_menu_transform( $input ){

        $fruits_farming_metabox_options = array( 'capitalize','uppercase','lowercase');
        if( in_array( $input,$fruits_farming_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'fruits_farming_sanitize_page_content_alignment' ) ) :

    // Sidebar Option Sanitize.
    function fruits_farming_sanitize_page_content_alignment( $input ){

        $fruits_farming_metabox_options = array( 'left','center','right');
        if( in_array( $input,$fruits_farming_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists( 'fruits_farming_sanitize_footer_widget_title_alignment' ) ) :

    // Footer Option Sanitize.
    function fruits_farming_sanitize_footer_widget_title_alignment( $input ){

        $fruits_farming_metabox_options = array( 'left','center','right');
        if( in_array( $input,$fruits_farming_metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;