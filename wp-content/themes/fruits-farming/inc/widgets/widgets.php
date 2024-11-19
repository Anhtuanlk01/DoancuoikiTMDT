<?php
/**
* Widget Functions.
*
* @package Fruits Farming
*/


function fruits_farming_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'fruits-farming'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'fruits-farming'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $fruits_farming_default = fruits_farming_get_default_theme_options();
    $fruits_farming_footer_column_layout = absint( get_theme_mod( 'fruits_farming_footer_column_layout',$fruits_farming_default['fruits_farming_footer_column_layout'] ) );

    for( $i = 0; $i < $fruits_farming_footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','fruits-farming'); }
    	if( $i == 1 ){ $count = esc_html__('Two','fruits-farming'); }
    	if( $i == 2 ){ $count = esc_html__('Three','fruits-farming'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'fruits-farming').$count,
	        'id' => 'fruits-farming-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'fruits-farming'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'fruits_farming_widgets_init');