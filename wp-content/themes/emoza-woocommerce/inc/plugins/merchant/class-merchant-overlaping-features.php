<?php
/**
 * Merchant Compatibility File
 *
 * @package Emoza
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Merchant' ) ) {
	return;
}

class Emoza_Merchant_Overlaping_Features {

	/**
	 * Overlaping modules.
	 * 
	 */
	public $overlaping_modules = array(
		'size-chart',
		'sticky-add-to-cart',
		'advanced-reviews',
		'buy-now',
		'video-gallery',
		'wishlist',
		'product-swatches',
		'quick-links',
		'google-autocomplete',
	);

	/**
	 * Modules map.
	 * Some modules have different id's, so we need to map them.
	 * 
	 */
	public $modules_map = array(
		'size-chart' => 'size-chart',
		'sticky-add-to-cart' => 'sticky-add-to-cart',
		'advanced-reviews' => 'advanced-reviews',
		'buy-now' => 'buy-now',
		'video-gallery' => array( 'product-video', 'product-audio' ),
		'wishlist' => 'wishlist',
		'product-swatches' => 'product-swatches',
		'quick-links' => 'quick-social-links',
		'google-autocomplete' => 'address-autocomplete',
	);

	/**
	 * Constructor.
	 * 
	 */
	public function __construct() {
		if ( ! defined( 'EMOZA_PRO_VERSION' ) ) {

			// Simply empty the array because all the overlapping modules are available only in Emoza Pro.
			$this->overlaping_modules = array();
		}

		$this->disable_modules_by_customizer_settings();
		$this->disable_modules_by_emoza_modules();
	}

	/**
	 * Get customizer overlaping features.
	 * 
	 * @param array $required_opts_to_disable_merchant_modules Required options to disable merchant modules.
	 * @return array $overlaping_features Overlaping features.
	 */
	public function get_customizer_overlaping_features( $required_opts_to_disable_merchant_modules ) {
		return array_map( function( $mmodule_id, $theme_mod ) {
			if ( ! is_array( $theme_mod[ 'mod_value' ] ) ) {
				return get_theme_mod( $theme_mod[ 'mod_name' ], $theme_mod[ 'mod_default' ] ) !== $theme_mod[ 'mod_value' ] ? $mmodule_id : false;
			} elseif( ! is_array( get_theme_mod( $theme_mod[ 'mod_name' ], $theme_mod[ 'mod_default' ] ) ) ) {
				return ! in_array( get_theme_mod( $theme_mod[ 'mod_name' ], $theme_mod[ 'mod_default' ] ), $theme_mod[ 'mod_value' ] ) ? $mmodule_id : false;
			} else {
				return array_intersect( get_theme_mod( $theme_mod[ 'mod_name' ], $theme_mod[ 'mod_default' ] ), $theme_mod[ 'mod_value' ] ) ? $mmodule_id : false;
			}
		}, array_keys( $required_opts_to_disable_merchant_modules ), $required_opts_to_disable_merchant_modules );
	}

	/**
	 * Disable modules by customizer settings.
	 * 
	 * @return void
	 */
	public function disable_modules_by_customizer_settings() {
		$default_single_product_components = function_exists( 'emoza_get_default_single_product_components' ) ? emoza_get_default_single_product_components() : array();

		$required_opts_to_disable_merchant_modules = array(
			'recently-viewed-products' => array(
				'pro'         => false,
				'mod_name'    => 'single_recently_viewed_products',
				'mod_value'   => 0,
				'mod_default' => 0,
			),
			'quick-view' => array(
				'pro'         => false,
				'mod_name'    => 'shop_product_quickview_layout',
				'mod_value'   => 'layout1',
				'mod_default' => 'layout1',
			),
			'checkout' => array(
				'pro'         => true,
				'mod_name'    => 'shop_checkout_layout',
				'mod_value'   => array( 'layout1', 'layout2' ),
				'mod_default' => 'layout1',
			),
			'floating-mini-cart' => array(
				'pro'         => true,
				'mod_name'    => 'side_mini_cart_floating_icon',
				'mod_value'   => '',
				'mod_default' => 0,
			),
			'side-cart' => array(
				'pro'         => true,
				'mod_name'    => 'mini_cart_style',
				'mod_value'   => 'default',
				'mod_default' => 'default',
			),
			'reasons-to-buy' => array(
				'pro'         => true,
				'mod_name'    => 'single_product_elements_order',
				'mod_value'   => array( 'emoza_single_product_reasons_to_buy' ),
				'mod_default' => $default_single_product_components,
			),
			'product-brand-image' => array(
				'pro'         => true,
				'mod_name'    => 'single_product_elements_order',
				'mod_value'   => array( 'emoza_single_product_brand_image' ),
				'mod_default' => $default_single_product_components,
			),
			'trust-badges' => array(
				'pro'         => true,
				'mod_name'    => 'single_product_elements_order',
				'mod_value'   => array( 'emoza_single_product_trust_badge_image' ),
				'mod_default' => $default_single_product_components,
			),
			'real-time-search' => array(
				'pro'         => false,
				'mod_name'    => 'shop_search_enable_ajax',
				'mod_value'   => '',
				'mod_default' => 0,
			),
			'scroll-to-top-button' => array(
				'pro'         => false,
				'mod_name'    => 'enable_scrolltop',
				'mod_value'   => '',
				'mod_default' => 1,
			),
		);

		$overlaping_features = self::get_customizer_overlaping_features( $required_opts_to_disable_merchant_modules );
		foreach( $overlaping_features as $mmodule_id ) {
			if ( $mmodule_id ) {
				$is_pro = $required_opts_to_disable_merchant_modules[ $mmodule_id ][ 'pro' ] ?? false;

				if ( ! defined( 'EMOZA_PRO_VERSION' ) && $is_pro ) {
					continue;
				}

				add_filter( "merchant_module_{$mmodule_id}_deactivate", function() {
					return true;
				} );
			}
		}
	}

	/**
	 * Disable merchant modules by checking for Emoza modules.
	 * 
	 * @return void
	 */
	public function disable_modules_by_emoza_modules() {
		$emoza_modules = get_option( 'emoza-modules' );
		$emoza_modules = ( is_array( $emoza_modules ) ) ? $emoza_modules : (array) $emoza_modules;

		foreach( $this->overlaping_modules as $module ) {
			if ( in_array( $module, $emoza_modules ) && isset( $emoza_modules[ $module ] ) && $emoza_modules[ $module ] ) {
				if ( is_array( $this->modules_map[$module] ) ) {
					foreach( $this->modules_map[$module] as $mmodule_id ) {
						add_filter( "merchant_module_{$mmodule_id}_deactivate", function() {
							return true;
						} );
					}
				} else {
					add_filter( "merchant_module_{$this->modules_map[$module]}_deactivate", function() {
						return true;
					} );
				}
			}
		}
	}
}

new Emoza_Merchant_Overlaping_Features();
