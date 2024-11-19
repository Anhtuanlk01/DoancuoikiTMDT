<?php

require get_template_directory() . '/inc/TGM/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function fruits_farming_register_recommended_plugins() {
	$plugins = array(		
		array(
			'name'             => __( 'YITH WooCommerce Wishlist', 'fruits-farming' ),
			'slug'             => 'yith-woocommerce-wishlist',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		),
		array(
			'name'             => __( 'WooCommerce', 'fruits-farming' ),
			'slug'             => 'woocommerce',
			'source'           => '',
			'required'         => false,
			'force_activation' => false,
		)
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'fruits_farming_register_recommended_plugins' );