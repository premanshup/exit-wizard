<?php
/**
 * Plugin Name: Exit Wizard
 * Plugin URI: https://codingallstars.com/
 * Description: Exit Wizard - Exit Intent Popup for WordPress pages.
 * Version: 1.0.0
 * Author: Coding Allstars
 * Author URI: https://codingallstars.com/
 * License: GPL2
 *
 * @package ACS_EW
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define constants.
define( 'ACS_EW_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ACS_EW_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include the main class.
require_once ACS_EW_PLUGIN_DIR . 'includes/class-acs-ew.php';
