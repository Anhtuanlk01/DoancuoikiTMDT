<?php
/**
 * Create page control
 *
 * @package Emoza
 *
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Emoza_Create_Page_Control extends WP_Customize_Control {
		
	/**
	 * The type of control being rendered
	 */
	public $type = 'emoza-create-page-control';
	public $page_title = '';
	public $page_meta_key = '';
	public $page_meta_value = '';
	public $option_name = '';

	/**
	 * Constructor
	 */
	public function __construct( $manager, $id, $args = array(), $options = array() ) {
		parent::__construct( $manager, $id, $args );
	}

	/**
	 * Render the control in the customizer
	 */
	public function render_content() {

		$page_id = get_option( $this->option_name );
		
		if( $page_id && post_exists( get_the_title( $page_id ) ) && get_post_status( $page_id ) === 'publish' ) {
			echo wp_kses_post( 
				sprintf(  /* translators: 1: link to edit page */
					__( 'Your page is created!<br>Click <a href="%s" target="_blank">here</a> if you want to edit the page.<br><br>If you want to show a link to this page, assign the page to a menu by clicking <a href="#" data-goto="nav_menus" data-type="panel">here</a>', 'emoza-woocommerce' ), 
				esc_url( get_admin_url() . 'post.php?post='. $page_id .'&action=edit' )
				) 
			);
		} else {
			echo '<div class="emoza-create-page-control-create-message">';
				echo wp_kses_post( 
					sprintf( /* translators: 1: page name */     
						__( 'It looks like you haven\'t created a <strong>%s</strong> page yet. Click the below button to create the page.', 'emoza-woocommerce' ), esc_html( $this->page_title ) 
					)
				);
				echo '<br><br>';
			echo '</div>';
			echo '<div class="emoza-create-page-control-success-message" style="display: none;">';
				echo wp_kses_post( 
					sprintf( /* translators: 1: link to edit page */    
						__( 'Page created with success!<br>Click <a href="%s" target="_blank">here</a> if you want to edit the page.<br><br>If you want to show a link to this page, assign the page to a menu by clicking <a href="#" data-goto="nav_menus" data-type="panel">here</a>', 'emoza-woocommerce' ), esc_url( get_admin_url() . 'post.php?post=&action=edit' ) 
					) 
				);
			echo '</div>';
			echo wp_kses_post( 
				sprintf( /* translators: 1: page title, 2: page meta key, 3: page meta value, 4: option name, 5: nonce, 6: loading text, 7: success text  */    
					__( '<a href="#" class="emoza-create-page-control-button button" data-page-title="%2$s" data-page-meta-key="%3$s" data-page-meta-value="%4$s" data-option-name="%5$s" data-nonce="%6$s" data-creating-text="%7$s" data-created-text="%8$s">%1$s</a>', 'emoza-woocommerce' ),
					esc_html__( 'Create Page', 'emoza-woocommerce' ),
					esc_attr( $this->page_title ),
					esc_attr( $this->page_meta_key ),
					esc_attr( $this->page_meta_value ),
					esc_attr( $this->option_name ),
					esc_attr( wp_create_nonce( 'customize-create-page-control-nonce' ) ),
					esc_attr__( 'Creating...', 'emoza-woocommerce' ),
					esc_attr__( 'Created!', 'emoza-woocommerce' )
				) 
			);
		}
	}
}
