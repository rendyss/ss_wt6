<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/14/2019
 * Time: 2:15 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT6_Shortcode' ) ) {
	class SSWT6_Shortcode {

		static function init() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new self();
			}

			return $instance;
		}

		private function __construct() {
			$this->register_shortcode();
		}

		private function register_shortcode() {
			add_shortcode( 'wp6_training', array( $this, 'generate_form_search' ) );
		}

		function generate_form_search() {
			global $ssWT6Temp;

			return $ssWT6Temp->render( 'search-form' );
		}
	}
}