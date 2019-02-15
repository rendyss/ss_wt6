<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2/14/2019
 * Time: 2:12 PM
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'SSWT6_FrontAssets' ) ) {
	class SSWT6_FrontAssets {

		static function init() {
			static $instance = null;
			if ( $instance === null ) {
				$instance = new self();
			}

			return $instance;
		}

		private function __construct() {
			$this->enqueu_assets();
		}

		private function enqueu_assets() {
			add_action( 'wp_enqueue_scripts', array( $this, 'assets_callback' ) );
		}

		function assets_callback() {

			//enqueu jquery ui's assets
			wp_enqueue_style( 'jquery-ui-core', plugin_dir_url( __DIR__ ) . 'assets/css/jquery-ui.min.css' );

			//enqueue bootstrap's assets
			wp_enqueue_style( 'bootstrap', plugin_dir_url( __DIR__ ) . 'assets/plugins/bootstrap/css/bootstrap.min.css' );
			wp_enqueue_script( 'bootstrap', plugin_dir_url( __DIR__ ) . 'assets/plugins/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );

			//enqueu custom assets
			wp_enqueue_style( 'custom', plugin_dir_url( __DIR__ ) . 'assets/css/custom.css' );
			wp_enqueue_script( 'search', plugin_dir_url( __DIR__ ) . 'assets/js/search.js', array( 'jquery-ui-autocomplete' ), false, true );
			wp_localize_script( 'search', 'objjs', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		}
	}
}