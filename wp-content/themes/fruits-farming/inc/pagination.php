<?php
/**
 *
 * Pagination Functions
 *
 * @package Fruits Farming
 */

if( !function_exists('fruits_farming_archive_pagination_x') ):

	// Archive Page Navigation
	function fruits_farming_archive_pagination_x(){

		the_posts_pagination();
	}

endif;
add_action('fruits_farming_archive_pagination','fruits_farming_archive_pagination_x',20);