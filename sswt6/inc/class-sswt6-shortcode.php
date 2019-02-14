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
				$instance = new SSWT6_Shortcode();
			}

			return $instance;
		}

		private function __construct() {
		}
	}
}