<?php
/*
Plugin Name: SS-WT6 (Ajax Search)
Description: Super simple plugins to search ajax
Version: 1.0.0
Author: Rendy
*/

//Include the main functions
require_once plugin_dir_path( __FILE__ ) . 'inc/class-sswt6.php';
SSWT6::init();

//Instance template class globally
$ssWT6Temp = new SSWT6_Template( plugin_dir_path( __FILE__ ) . 'templates' );