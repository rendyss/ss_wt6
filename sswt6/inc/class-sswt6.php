<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/14/2019
 * Time: 2:10 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT6' ) ) {
	class SSWT6 {
		static function init() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new SSWT6();
			}

			return $instance;
		}

		private function __construct() {
			$this->load_shortcode();
			$this->load_template();

			if ( ! is_admin() ) { //these classes only used in front end
				$this->load_assets();
				$this->load_ajax();
			}
		}

		private function load_assets() {
			require_once plugin_dir_path( __DIR__ ) . 'inc/class-sswt6-front-assets.php';
			SSWT6_FrontAssets::init();

		}

		private function load_shortcode() {
			require_once plugin_dir_path( __DIR__ ) . 'inc/class-sswt6-shortcode.php';
			SSWT6_Shortcode::init();
		}

		private function load_ajax() {
			require_once plugin_dir_path( __DIR__ ) . 'inc/class-sswt6-ajax.php';
			SSWT6_Ajax::init();
		}

		private function load_template() {
			require_once plugin_dir_path( __DIR__ ) . 'inc/class-sswt6-template.php';
		}
	}
}