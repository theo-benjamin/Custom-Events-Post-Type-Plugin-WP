<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              iamtheo.me
 * @since             1.0.0
 * @package           Events_Custom_Post
 *
 * @wordpress-plugin
 * Plugin Name:       Events-Custom-Post
 * Plugin URI:        iamtheo.me
 * Description:       Add a custom post type called Events and a SpliceEvents Shortcode to display events
 * Version:           1.0.0
 * Author:            Theophilus Benjamin
 * Author URI:        iamtheo.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       events-custom-post
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'EVENTS_CUSTOM_POST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-events-custom-post-activator.php
 */
function activate_events_custom_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-events-custom-post-activator.php';
	Events_Custom_Post_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-events-custom-post-deactivator.php
 */
function deactivate_events_custom_post() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-events-custom-post-deactivator.php';
	Events_Custom_Post_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_events_custom_post' );
register_deactivation_hook( __FILE__, 'deactivate_events_custom_post' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-events-custom-post.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_events_custom_post() {

	$plugin = new Events_Custom_Post();
	$plugin->run();

}
run_events_custom_post();
