<?php
/**
 * Header Layout
 * @package Fruits Farming
 */

$fruits_farming_default = fruits_farming_get_default_theme_options();

$fruits_farming_header_layout_phone_number = esc_html( get_theme_mod( 'fruits_farming_header_layout_phone_number',
$fruits_farming_default['fruits_farming_header_layout_phone_number'] ) );

$fruits_farming_header_layout_email_address = esc_html( get_theme_mod( 'fruits_farming_header_layout_email_address',
$fruits_farming_default['fruits_farming_header_layout_email_address'] ) );

$fruits_farming_header_layout_address = esc_html( get_theme_mod( 'fruits_farming_header_layout_address',
$fruits_farming_default['fruits_farming_header_layout_address'] ) );

$fruits_farming_header_search = get_theme_mod( 'fruits_farming_header_search', 
$fruits_farming_default['fruits_farming_header_search'] );

$fruits_farming_header_layout_button = esc_html( get_theme_mod( 'fruits_farming_header_layout_button',
$fruits_farming_default['fruits_farming_header_layout_button'] ) );

$fruits_farming_header_layout_button_url = esc_url( get_theme_mod( 'fruits_farming_header_layout_button_url',
$fruits_farming_default['fruits_farming_header_layout_button_url'] ) );

?>

<section id="center-header">
    <div class=" header-main wrapper-flex">
        <div class="header-right-box theme-header-areas">
            <header id="site-header" class="site-header-layout header-layout" role="banner">
                <div class="header-center">
                    <div class="theme-header-areas header-areas-right header-logo">
                        <div class="header-titles">
                            <?php
                                fruits_farming_site_logo();
                                fruits_farming_site_description();
                            ?>
                        </div>
                    </div>
                    <div class="theme-header-areas header-areas-right header-menu">
                        <div class="site-navigation">
                            <nav class="primary-menu-wrapper" aria-label="<?php esc_attr_e('Horizontal', 'fruits-farming'); ?>" role="navigation">
                                <ul class="primary-menu theme-menu">
                                    <?php
                                    if (has_nav_menu('fruits-farming-primary-menu')) {
                                        wp_nav_menu(
                                            array(
                                                'container' => '',
                                                'items_wrap' => '%3$s',
                                                'theme_location' => 'fruits-farming-primary-menu',
                                            )
                                        );
                                    } else {
                                        wp_list_pages(
                                            array(
                                                'match_menu_classes' => true,
                                                'show_sub_menu_icons' => true,
                                                'title_li' => false,
                                                'walker' => new Fruits_Farming_Walker_Page(),
                                            )
                                        );
                                    } ?>
                                </ul>
                            </nav>
                        </div>
                        <div class="navbar-controls twp-hide-js">
                            <button type="button" class="navbar-control navbar-control-offcanvas">
                                <span class="navbar-control-trigger" tabindex="-1">
                                    <?php fruits_farming_the_theme_svg('menu'); ?>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="theme-header-areas header-areas-right woo-box">
                        <?php if( $fruits_farming_header_search ){ ?>
                            <span class="header-search"> 
                                <a href="#search">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6 .1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/></svg>
                                </a>
                                <!-- Search Form -->
                                <div id="search">
                                    <span class="close">X</span>
                                    <?php get_search_form(); ?>
                                </div>
                            </span>
                        <?php } ?>
                        <?php if ( class_exists( 'WooCommerce' ) ) { ?>
                            <?php if(defined('YITH_WCWL')){ ?>
                              <a class="wishlist_view" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M462.3 62.6C407.5 15.9 326 24.3 275.7 76.2L256 96.5l-19.7-20.3C186.1 24.3 104.5 15.9 49.7 62.6c-62.8 53.6-66.1 149.8-9.9 207.9l193.5 199.8c12.5 12.9 32.8 12.9 45.3 0l193.5-199.8c56.3-58.1 53-154.3-9.8-207.9z"/></svg>
                                  <?php $wishlist_count = YITH_WCWL()->count_products(); ?>
                                <span class="wishlist-counter"><?php echo $wishlist_count; ?></span>
                              </a>
                            <?php }?>
                        <?php } ?>
                        <?php if(class_exists('woocommerce')){ ?>
                            <span class="cart_no">
                                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','fruits-farming' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M528.1 301.3l47.3-208C578.8 78.3 567.4 64 552 64H159.2l-9.2-44.8C147.8 8 137.9 0 126.5 0H24C10.7 0 0 10.7 0 24v16c0 13.3 10.7 24 24 24h69.9l70.2 343.4C147.3 417.1 136 435.2 136 456c0 30.9 25.1 56 56 56s56-25.1 56-56c0-15.7-6.4-29.8-16.8-40h209.6C430.4 426.2 424 440.3 424 456c0 30.9 25.1 56 56 56s56-25.1 56-56c0-22.2-12.9-41.3-31.6-50.4l5.5-24.3c3.4-15-8-29.3-23.4-29.3H218.1l-6.5-32h293.1c11.2 0 20.9-7.8 23.4-18.7z"/></svg></a>
                                <span class="cart-value"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
                            </span>
                        <?php } ?>
                    </div>
                    <div class="theme-header-areas header-areas-right header-button">
                        <?php if( $fruits_farming_header_layout_button || $fruits_farming_header_layout_button_url ){ ?>
                            <span>
                                <a href="<?php echo esc_url( $fruits_farming_header_layout_button_url ); ?>"><?php echo esc_html( $fruits_farming_header_layout_button ); ?></a>
                            </span>
                        <?php } ?>
                    </div>
                </div>
            </header>
            <section id="top-header">
                <div class="header-wrapper">
                    <div class="theme-header-areas category-box">
                        <?php if(class_exists('woocommerce')){ ?>
                            <div class="product-category-area">
                                <button class="product-btn"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/></svg><?php esc_html_e('All Category','fruits-farming'); ?></button>
                                <div class="product-cat">
                                    <?php
                                        $args = array(
                                            'orderby'    => 'title',
                                            'order'      => 'ASC',
                                            'hide_empty' => 0,
                                            'parent'  => 0
                                        );
                                        $product_categories = get_terms( 'product_cat', $args );
                                        $count = count($product_categories);
                                        if ( $count > 0 ){
                                            foreach ( $product_categories as $product_category ) {
                                            $product_cat_id   = $product_category->term_id;
                                            $cat_link = get_category_link( $product_cat_id );
                                            if ($product_category->category_parent == 0) { ?>
                                            <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M285.5 273L91.1 467.3c-9.4 9.4-24.6 9.4-33.9 0l-22.7-22.7c-9.4-9.4-9.4-24.5 0-33.9L188.5 256 34.5 101.3c-9.3-9.4-9.3-24.5 0-33.9l22.7-22.7c9.4-9.4 24.6-9.4 33.9 0L285.5 239c9.4 9.4 9.4 24.6 0 33.9z"/></svg><?php
                                    }
                                    echo esc_html( $product_category->name ); ?></a></li>
                                    <?php } } ?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div class="theme-header-areas header-areas-right contact-box">
                        <?php if( $fruits_farming_header_layout_address ){ ?>
                           <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M172.3 501.7C27 291 0 269.4 0 192 0 86 86 0 192 0s192 86 192 192c0 77.4-27 99-172.3 309.7-9.5 13.8-29.9 13.8-39.5 0zM192 272c44.2 0 80-35.8 80-80s-35.8-80-80-80-80 35.8-80 80 35.8 80 80 80z"/></svg><?php echo esc_html( $fruits_farming_header_layout_address ); ?></span>
                        <?php } ?>
                    </div>
                    <div class="theme-header-areas header-areas-right right-border contact-box">
                        <?php if( $fruits_farming_header_layout_phone_number ){ ?>
                           <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M97.3 507c-129.9-129.9-129.7-340.3 0-469.9 5.7-5.7 14.5-6.6 21.3-2.4l64.8 40.5a17.2 17.2 0 0 1 6.8 21l-32.4 81a17.2 17.2 0 0 1 -17.7 10.7l-55.8-5.6c-21.1 58.3-20.6 122.5 0 179.5l55.8-5.6a17.2 17.2 0 0 1 17.7 10.7l32.4 81a17.2 17.2 0 0 1 -6.8 21l-64.8 40.5a17.2 17.2 0 0 1 -21.3-2.4zM247.1 95.5c11.8 20 11.8 45 0 65.1-4 6.7-13.1 8-18.7 2.6l-6-5.7c-3.9-3.7-4.8-9.6-2.3-14.4a32.1 32.1 0 0 0 0-29.9c-2.5-4.8-1.7-10.7 2.3-14.4l6-5.7c5.6-5.4 14.8-4.1 18.7 2.6zm91.8-91.2c60.1 71.6 60.1 175.9 0 247.4-4.5 5.3-12.5 5.7-17.6 .9l-5.8-5.6c-4.6-4.4-5-11.5-.9-16.4 49.7-59.5 49.6-145.9 0-205.4-4-4.9-3.6-12 .9-16.4l5.8-5.6c5-4.8 13.1-4.4 17.6 .9zm-46 44.9c36.1 46.3 36.1 111.1 0 157.5-4.4 5.6-12.7 6.3-17.9 1.3l-5.8-5.6c-4.4-4.2-5-11.1-1.3-15.9 26.5-34.6 26.5-82.6 0-117.1-3.7-4.8-3.1-11.7 1.3-15.9l5.8-5.6c5.2-4.9 13.5-4.3 17.9 1.3z"/></svg>
                            <a href="tell:<?php echo esc_attr( $fruits_farming_header_layout_phone_number ); ?>"><?php echo esc_html( $fruits_farming_header_layout_phone_number ); ?></a></span>
                        <?php } ?>
                    </div>
                    <div class="theme-header-areas header-areas-right side-border contact-box">
                        <?php if( $fruits_farming_header_layout_email_address ){ ?>
                           <span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7 .3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2 .4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg><a href="mailto:<?php echo esc_html( $fruits_farming_header_layout_email_address ); ?>"><?php echo esc_html( $fruits_farming_header_layout_email_address ); ?></a></span>
                        <?php } ?>
                    </div>
                    
                </div>
            </section>
        </div>
    </div>
</section>