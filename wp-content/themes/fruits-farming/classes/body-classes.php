<?php
/**
* Body Classes.
* @package Fruits Farming
*/
 
 if (!function_exists('fruits_farming_body_classes')) :

    function fruits_farming_body_classes($classes) {

        $fruits_farming_default = fruits_farming_get_default_theme_options();
        global $post;
        // Adds a class of hfeed to non-singular pages.
        if ( !is_singular() ) {
            $classes[] = 'hfeed';
        }

        // Adds a class of no-sidebar when there is no sidebar present.
        if ( !is_active_sidebar( 'sidebar-1' ) ) {
            $classes[] = 'no-sidebar';
        }

        $fruits_farming_global_sidebar_layout = esc_html( get_theme_mod( 'fruits_farming_global_sidebar_layout',$fruits_farming_default['fruits_farming_global_sidebar_layout'] ) );

        if ( is_active_sidebar( 'sidebar-1' ) ) {
            if( is_single() || is_page() ){
                $fruits_farming_post_sidebar = esc_html( get_post_meta( $post->ID, 'fruits_farming_post_sidebar_option', true ) );
                if (empty($fruits_farming_post_sidebar) || ($fruits_farming_post_sidebar == 'global-sidebar')) {
                    $classes[] = esc_attr( $fruits_farming_global_sidebar_layout );
                } else{
                    $classes[] = esc_attr( $fruits_farming_post_sidebar );
                }
            }else{
                $classes[] = esc_attr( $fruits_farming_global_sidebar_layout );
            }
            
        }
        
        return $classes;
    }

endif;

add_filter('body_class', 'fruits_farming_body_classes');