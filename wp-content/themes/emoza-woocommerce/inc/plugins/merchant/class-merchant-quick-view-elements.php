<?php
/**
 * Merchant Compatibility File for Emoza quick view elements.
 *
 * @package Emoza
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Emoza_Merchant_Quick_View_Elements {

	/**
	 * Constructor.
	 * 
	 */
	public function __construct() {

		// The quick view from Emoza is intentionally develop to not include the default woocommerce hooks inside the content modal
		// to prevent the area crowded with extra plugins content. But whether some Merchant modules are enabled, then we should trigger the respective module hooks.
		add_action( 'emoza_quick_view_product_add_to_cart_start', array( $this, 'before_add_to_cart_form' ) );
		add_action( 'emoza_quick_view_product_add_to_cart_end', array( $this, 'after_add_to_cart_form' ) );
	}

    /**
     * Before add to cart form.
     * 
	 * @return void
     */
    public function before_add_to_cart_form() {

		// Bulk discounts, Buy x get y
        do_action( 'woocommerce_before_add_to_cart_form' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.HookCommentWrongStyle
    }

    /**
     * After add to cart form.
     * 
	 * @return void
     */
    public function after_add_to_cart_form() {

		// Bulk discounts, Buy x get y
        do_action( 'woocommerce_after_add_to_cart_form' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.HookCommentWrongStyle
    }
}

new Emoza_Merchant_Quick_View_Elements();
