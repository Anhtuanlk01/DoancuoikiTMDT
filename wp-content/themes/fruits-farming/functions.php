<?php
/**
 * Fruits Farming functions and definitions
 * @package Fruits Farming
 */

if ( ! function_exists( 'fruits_farming_after_theme_support' ) ) :

	function fruits_farming_after_theme_support() {
		
		load_theme_textdomain( 'fruits-farming', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support('woocommerce');
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
        add_theme_support('woocommerce', array(
            'gallery_thumbnail_image_width' => 300,
        ));

		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'ffffff',
			)
		);

		$GLOBALS['content_width'] = apply_filters( 'fruits_farming_content_width', 1140 );
		
		add_theme_support( 'post-thumbnails' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 270,
				'width'       => 90,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);
		
		add_theme_support( 'title-tag' );

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);

		add_theme_support( 'post-formats', array(
		    'video',
		    'audio',
		    'gallery',
		    'quote',
		    'image'
		) );
		
		add_theme_support( 'align-wide' );
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'wp-block-styles' );

	}

endif;

add_action( 'after_setup_theme', 'fruits_farming_after_theme_support' );

/**
 * Register and Enqueue Styles.
 */
function fruits_farming_register_styles() {

	wp_enqueue_style( 'dashicons' );

    $theme_version = wp_get_theme()->get( 'Version' );
	$fonts_url = fruits_farming_fonts_url();
    if( $fonts_url ){
    	require_once get_theme_file_path( 'lib/custom/css/wptt-webfont-loader.php' );
        wp_enqueue_style(
			'fruits-farming-google-fonts',
			wptt_get_webfont_url( $fonts_url ),
			array(),
			$theme_version
		);
    }

    wp_enqueue_style( 'swiper', get_template_directory_uri() . '/lib/swiper/css/swiper-bundle.min.css');
	wp_enqueue_style( 'fruits-farming-style', get_stylesheet_uri(), array(), $theme_version );

	wp_enqueue_style( 'fruits-farming-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/custom_css.php' );
	wp_add_inline_style( 'fruits-farming-style',$fruits_farming_custom_css );

	$fruits_farming_css = '';

	if ( get_header_image() ) :

		$fruits_farming_css .=  '
			#center-header{
				background-image: url('.esc_url(get_header_image()).') !important;
				-webkit-background-size: cover !important;
				-moz-background-size: cover !important;
				-o-background-size: cover !important;
				background-size: cover !important;
			}';

	endif;

	wp_add_inline_style( 'fruits-farming-style', $fruits_farming_css );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}	

	wp_enqueue_script( 'imagesloaded' );
    wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/lib/swiper/js/swiper-bundle.min.js', array('jquery'), '', 1);
	wp_enqueue_script( 'fruits-farming-custom', get_template_directory_uri() . '/lib/custom/js/theme-custom-script.js', array('jquery'), '', 1);

    // Global Query
    if( is_front_page() ){

    	$posts_per_page = absint( get_option('posts_per_page') );
        $c_paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
        $posts_args = array(
            'posts_per_page'        => $posts_per_page,
            'paged'                 => $c_paged,
        );
        $posts_qry = new WP_Query( $posts_args );
        $max = $posts_qry->max_num_pages;

    }else{
        global $wp_query;
        $max = $wp_query->max_num_pages;
        $c_paged = ( get_query_var( 'paged' ) > 1 ) ? get_query_var( 'paged' ) : 1;
    }

    $fruits_farming_default = fruits_farming_get_default_theme_options();
    $fruits_farming_pagination_layout = get_theme_mod( 'fruits_farming_pagination_layout',$fruits_farming_default['fruits_farming_pagination_layout'] );
}

add_action( 'wp_enqueue_scripts', 'fruits_farming_register_styles',200 );

function fruits_farming_admin_enqueue_scripts_callback() {
    if ( ! did_action( 'wp_enqueue_media' ) ) {
    wp_enqueue_media();
    }
    wp_enqueue_script('fruits-farming-uploaderjs', get_stylesheet_directory_uri() . '/lib/custom/js/uploader.js', array(), "1.0", true);
}
add_action( 'admin_enqueue_scripts', 'fruits_farming_admin_enqueue_scripts_callback' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function fruits_farming_menus() {

	$locations = array(
		'fruits-farming-primary-menu'  => esc_html__( 'Primary Menu', 'fruits-farming' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'fruits_farming_menus' );

add_filter('loop_shop_columns', 'fruits_farming_loop_columns');
if (!function_exists('fruits_farming_loop_columns')) {
	function fruits_farming_loop_columns() {
		$fruits_farming_columns = get_theme_mod( 'fruits_farming_per_columns', 3 );
		return $fruits_farming_columns;
	}
}

add_filter( 'loop_shop_per_page', 'fruits_farming_per_page', 20 );
function fruits_farming_per_page( $fruits_farming_cols ) {
  	$fruits_farming_cols = get_theme_mod( 'fruits_farming_product_per_page', 9 );
	return $fruits_farming_cols;
}

require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/classes/class-svg-icons.php';
require get_template_directory() . '/classes/class-walker-menu.php';
require get_template_directory() . '/inc/customizer/customizer.php';
require get_template_directory() . '/inc/custom-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/classes/body-classes.php';
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/metabox.php';
require get_template_directory() . '/inc/pagination.php';
require get_template_directory() . '/lib/breadcrumbs/breadcrumbs.php';
require get_template_directory() . '/lib/custom/css/dynamic-style.php';
require get_template_directory() . '/inc/TGM/tgm.php';

/**
 * For Admin Page
 */
if (is_admin()) {
	require get_template_directory() . '/inc/get-started/get-started.php';
}

if (! defined( 'FRUITS_FARMING_DOCS_PRO' ) ){
define('FRUITS_FARMING_DOCS_PRO',__('https://layout.omegathemes.com/steps/pro-fruits-farming/','fruits-farming'));
}
if (! defined( 'FRUITS_FARMING_BUY_NOW' ) ){
define('FRUITS_FARMING_BUY_NOW',__('https://www.omegathemes.com/products/fruits-wordpress-theme','fruits-farming'));
}
if (! defined( 'FRUITS_FARMING_SUPPORT_FREE' ) ){
define('FRUITS_FARMING_SUPPORT_FREE',__('https://wordpress.org/support/theme/fruits-farming/','fruits-farming'));
}
if (! defined( 'FRUITS_FARMING_REVIEW_FREE' ) ){
define('FRUITS_FARMING_REVIEW_FREE',__('https://wordpress.org/support/theme/fruits-farming/reviews/#new-post','fruits-farming'));
}
if (! defined( 'FRUITS_FARMING_DEMO_PRO' ) ){
define('FRUITS_FARMING_DEMO_PRO',__('https://layout.omegathemes.com/fruits-farming/','fruits-farming'));
}
if (! defined( 'FRUITS_FARMING_LITE_DOCS_PRO' ) ){
define('FRUITS_FARMING_LITE_DOCS_PRO',__('https://layout.omegathemes.com/steps/free-fruits-farming/','fruits-farming'));
}

function fruits_farming_remove_customize_register() {
    global $wp_customize;

    $wp_customize->remove_setting( 'display_header_text' );
    $wp_customize->remove_control( 'display_header_text' );

}

add_action( 'customize_register', 'fruits_farming_remove_customize_register', 11 );

// Apply styles based on customizer settings

function fruits_farming_customizer_css() {
    ?>
    <style type="text/css">
        <?php
        $fruits_farming_footer_widget_background_color = get_theme_mod('fruits_farming_footer_widget_background_color');
        if ($fruits_farming_footer_widget_background_color) {
            echo '.footer-widgetarea { background-color: ' . esc_attr($fruits_farming_footer_widget_background_color) . '; }';
        }

        $footer_widget_background_image = get_theme_mod('footer_widget_background_image');
        if ($footer_widget_background_image) {
            echo '.footer-widgetarea { background-image: url(' . esc_url($footer_widget_background_image) . '); }';
        }
        $fruits_farming_copyright_font_size = get_theme_mod('fruits_farming_copyright_font_size');
        if ($fruits_farming_copyright_font_size) {
            echo '.footer-copyright { font-size: ' . esc_attr($fruits_farming_copyright_font_size) . 'px;}';
        }
        ?>
    </style>
    <?php
}
add_action('wp_head', 'fruits_farming_customizer_css');

function fruits_farming_radio_sanitize(  $input, $setting  ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}
require get_template_directory() . '/inc/general.php';