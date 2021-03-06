<?php
/*
 * Plugin Name: Demo Delayed Admin Notice Plugin
 * Plugin URI: https://www.mattcromwell.com/delayed-admin-notice
 * Description: This plugin is a demo of a simple way to trigger a delayed Admin notice from your plugin.
 * Author: Matt Cromwell
 * Version: 1.0
 * Author URI: https://www.mattcromwell.com
 *
 *  Simply include the code below in the root file of your plugin, 
 *  then include "admin/notice.php" folder and file in your plugin, 
 *  then update the following
 *  1. Do a search/replace for "your_prefix_" for whatever you'd like
 *  2. Do a search/replace for "your-plugin-textdomain" for whatever you'd like
 *  3. Update the $plugin_name, $review_url, and $donate_url found in "admin/notice.php"
 */

// Step 1: Do a search/replace for "your_prefix_" and replace it with whatever you like.

include( dirname(__FILE__) . '/admin/notice.php' );

register_activation_hook( __FILE__,  'your_prefix_set_review_trigger_date' );

function your_prefix_set_review_trigger_date() {

	// Create timestamp for when plugin was activated

	$triggerreview = mktime(0, 0, 0, date("m")  , date("d")+30, date("Y"));
	
	// If our option doesn't exist already, we'll create it with today's timestamp
	if ( !get_option( 'your_prefix_activation_date')) {
		add_option( 'your_prefix_activation_date', $triggerreview, '', 'yes' );
	}
}