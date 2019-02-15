<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/15/2019
 * Time: 8:19 AM
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'custom_pagination' ) ) {
	function custom_pagination( $paged, $max_page, $pagerange = 4 ) {
		/**
		 * This first part of our function is a fallback
		 * for custom pagination inside a regular loop that
		 * uses the global $paged and global $wp_query variables.
		 *
		 * It's good because we can now override default pagination
		 * in our theme, and use this function in default quries
		 * and custom queries.
		 */
		$paged = empty( $paged ) ? 1 : $paged;

		/**
		 * We construct the pagination arguments to enter into our paginate_links
		 * function.
		 */
		$pagination_args = array(
			'base'         => '%_%',
			'format'       => '?paged=%#%',
			'total'        => $max_page,
			'current'      => $paged,
			'show_all'     => false,
			'end_size'     => 1,
			'mid_size'     => $pagerange,
			'prev_next'    => true,
			'prev_text'    => __( '<i class="fa fa-angle-left"></i>' ),
			'next_text'    => __( '<i class="fa fa-angle-right"></i>' ),
			'type'         => 'list',
			'add_args'     => false,
			'add_fragment' => ''
		);

		$paginate_links = paginate_links( $pagination_args );

		$results = "";
		if ( $paginate_links ) {
			$results = $paginate_links;
		}

		return $results;
	}
}