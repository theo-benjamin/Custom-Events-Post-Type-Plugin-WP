<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       iamtheo.me
 * @since      1.0.0
 *
 * @package    Events_Custom_Post
 * @subpackage Events_Custom_Post/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Events_Custom_Post
 * @subpackage Events_Custom_Post/includes
 * @author     Theophilus Benjamin <btheophilus1960@gmail.com>
 */
class Events_Custom_Post_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'events-custom-post',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
