<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/14/2019
 * Time: 2:34 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'SSWT6_Ajax' ) ) {
	class SSWT6_Ajax {
		static function init() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new SSWT6_Ajax();
			}

			return $instance;
		}

		private function __construct() {
			$this->register_ajax();
		}

		private function register_ajax() {
			add_action( 'wp_ajax_search_posts', array( $this, 'search_posts_callback' ) );
			add_action( 'wp_ajax_nopriv_search_posts', array( $this, 'search_posts_callback' ) );
		}

		function search_posts_callback() {

		}
	}
}