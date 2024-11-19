<?php
/**
* Custom Functions.
*
* @package Fruits Farming
*/

if( !function_exists( 'fruits_farming_sanitize_sidebar_option' ) ) :

    // Sidebar Option Sanitize.
    function fruits_farming_sanitize_sidebar_option( $fruits_farming_input ){

        $fruits_farming_metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $fruits_farming_input,$fruits_farming_metabox_options ) ){

            return $fruits_farming_input;

        }

        return;

    }

endif;

if ( ! function_exists( 'fruits_farming_sanitize_checkbox' ) ) :

	/**
	 * Sanitize checkbox.
	 */
	function fruits_farming_sanitize_checkbox( $fruits_farming_checked ) {

		return ( ( isset( $fruits_farming_checked ) && true === $fruits_farming_checked ) ? true : false );

	}

endif;


if ( ! function_exists( 'fruits_farming_sanitize_select' ) ) :

    /**
     * Sanitize select.
     */
    function fruits_farming_sanitize_select( $fruits_farming_input, $fruits_farming_setting ) {
        $fruits_farming_input = sanitize_text_field( $fruits_farming_input );
        $choices = $fruits_farming_setting->manager->get_control( $fruits_farming_setting->id )->choices;
        return ( array_key_exists( $fruits_farming_input, $choices ) ? $fruits_farming_input : $fruits_farming_setting->default );
    }

endif;
