<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       iamtheo.me
 * @since      1.0.0
 *
 * @package    Events_Custom_Post
 * @subpackage Events_Custom_Post/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Events_Custom_Post
 * @subpackage Events_Custom_Post/admin
 * @author     Theophilus Benjamin <btheophilus1960@gmail.com>
 */
class Events_Custom_Post_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($plugin_name, $version)
	{

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Events_Custom_Post_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Events_Custom_Post_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/events-custom-post-admin.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Events_Custom_Post_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Events_Custom_Post_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/events-custom-post-admin.js', array('jquery'), $this->version, false);
	}


	/**
	 * Register Post Type Events
	 */

	public function register_events_post_type()
	{

		$labels = [
			'name' => _x('Events', 'Post Type General Name', 'splice-test-events'),
			'singular_name' => _x('Event', 'Post Type Singular Name', 'splice-test-events'),
			'menu_name' => _x('Events', 'Admin Menu text', 'splice-test-events'),
			'name_admin_bar' => _x('Event', 'Add New on Toolbar', 'splice-test-events'),
			'archives' => __('Event Archives', 'splice-test-events'),
			'attributes' => __('Event Attributes', 'splice-test-events'),
			'parent_item_colon' => __('Parent Event:', 'splice-test-events'),
			'all_items' => __('All Events', 'splice-test-events'),
			'add_new_item' => __('Add New Event', 'splice-test-events'),
			'add_new' => __('Add New', 'splice-test-events'),
			'new_item' => __('New Event', 'splice-test-events'),
			'edit_item' => __('Edit Event', 'splice-test-events'),
			'update_item' => __('Update Event', 'splice-test-events'),
			'view_item' => __('View Event', 'splice-test-events'),
			'view_items' => __('View Events', 'splice-test-events'),
			'search_items' => __('Search Event', 'splice-test-events'),
			'not_found' => __('Not found', 'splice-test-events'),
			'not_found_in_trash' => __('Not found in Trash', 'splice-test-events'),
			'featured_image' => __('Featured Image', 'splice-test-events'),
			'set_featured_image' => __('Set featured image', 'splice-test-events'),
			'remove_featured_image' => __('Remove featured image', 'splice-test-events'),
			'use_featured_image' => __('Use as featured image', 'splice-test-events'),
			'insert_into_item' => __('Insert into Event', 'splice-test-events'),
			'uploaded_to_this_item' => __('Uploaded to this Event', 'splice-test-events'),
			'items_list' => __('Events list', 'splice-test-events'),
			'items_list_navigation' => __('Events list navigation', 'splice-test-events'),
			'filter_items_list' => __('Filter Events list', 'splice-test-events'),
		];
		$args = [
			'label' => __('Event', 'splice-test-events'),
			'description' => __('An Events Custom Post Type', 'splice-test-events'),
			'labels' => $labels,
			'menu_icon' => 'dashicons-calendar',
			'supports' => array('title'),
			'taxonomies' => array(),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 5,
			'show_in_admin_bar' => true,
			'show_in_nav_menus' => true,
			'can_export' => true,
			'has_archive' => true,
			'hierarchical' => false,
			'exclude_from_search' => true,
			'show_in_rest' => true,
			'rest_base' => 'events',
			'publicly_queryable' => true,
			'capability_type' => 'post',
		];

		register_post_type('Event', $args);
	}

	public function add_events_meta_boxes()
	{

		//Description Meta BOX
		add_meta_box(
			'custom_events_description',
			'Description',
			[$this, 'events_description_meta_box'],
			'event',
			'normal',
			'core'
		);

		// Sign Up Link Meta BOX
		add_meta_box(
			'custom_events_signup_link',
			'Sign Up Link',
			[$this, 'events_signup_link_meta_box'],
			'event',
			'normal',
			'core'
		);

		// Start Time Meta BOX
		add_meta_box(
			'custom_events_start_time',
			'Start Time',
			[$this, 'events_start_time_meta_box'],
			'event',
			'side',   // Show the meta box at the side in order tokeep the UI clean and prevent long scrolls
			'core',
		);

		// End Time Meta BOX
		add_meta_box(
			'custom_events_end_time',
			'End Time',
			[$this, 'events_end_time_meta_box'],
			'event',  // Show the meta box at the side in order tokeep the UI clean and prevent long scrolls
			'side',
			'core'
		);
	}

	//render description metabox
	public function events_description_meta_box()
	{
		/**
		 * Fetch field value and update input box value
		 * So input box is not empty after saving
		 */
		global $post;
		$event_post = get_post_custom($post->ID); // Fetch Post
		$input_data = $event_post['cpt_event_description'][0]; // Fetch specific field value from post

		//render text field with specific field value
		echo "<textarea name='cpt_event_description' rows='10' cols='100' required >" . $input_data . "</textarea>";
	}

	//render signup link metabox
	public function events_signup_link_meta_box()
	{

		global $post;
		$event_post = get_post_custom($post->ID);
		$input_data = $event_post['cpt_event_signup_link'][0];

		echo "<input id='event_signup_link' type='url' name='cpt_event_signup_link' value='" . $input_data . "' required/>";
	}

	//render start time meta box
	public function events_start_time_meta_box()
	{
		global $post;
		$event_post = get_post_custom($post->ID);
		$input_data = $event_post['cpt_event_start_time'][0];

		echo "<input type='datetime-local' id='event_start_time' name='cpt_event_start_time' value='" . $input_data . "' required />";
	}

	//render end time meta box
	public function events_end_time_meta_box()
	{
		global $post;
		$event_post = get_post_custom($post->ID);
		$input_data = $event_post['cpt_event_end_time'][0];

		//  Get the start date and set it as the minimum date for end date to prevent users from selecting date prior to start date as end date
		$min_date = $event_post['cpt_event_start_time'][0];
		echo "<input type='datetime-local' id='event_end_time' min='" . $min_date . "' name='cpt_event_end_time' value='" . $input_data . "' required />";
	}

	//Save EVENT Data
	public function events_save_post_meta_box()
	{
		global $post;

		//Prevent Data from saving on autosave
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}

		// Sanitize and Save POST Data

		//-- Sanitize and save event description
		update_post_meta($post->ID, 'cpt_event_description', sanitize_text_field($_POST['cpt_event_description']));

		//-- Sanitize and save event sign up link
		update_post_meta($post->ID, 'cpt_event_signup_link', sanitize_url($_POST['cpt_event_signup_link']));

		//-- Sanitize and save event start time
		update_post_meta($post->ID, 'cpt_event_start_time', sanitize_text_field($_POST['cpt_event_start_time']));

		//-- Sanitize and save event end tim
		update_post_meta($post->ID, 'cpt_event_end_time', sanitize_text_field($_POST['cpt_event_end_time']));
	}


	/**
	 * Remove date published from column
	 * Add  start time column to the event custom post type
	 * Add end time column to the event custom post type
	 * 
	 */
	public function set_custom_event_column($columns)
	{
		unset($columns['date']);
		$columns['start_time'] = _('Start Date & Time');
		$columns['cpt_event_end_time'] = _('End Date & Time');

		return $columns;
	}


	//Add data to the start time and end time column for event post type
	public function add_data_custom_event_column($column, $post_id)
	{
		// Format Date to display day month year 
		$start_time = new DateTime(get_post_meta($post_id, 'cpt_event_start_time', true));
		$end_time = new DateTime(get_post_meta($post_id, 'cpt_event_end_time', true));
		switch ($column) {
			case 'start_time':
				echo $start_time->format('d-m-Y H:i');
				break;
			case 'end_time':
				echo $end_time->format('d-m-Y H:i');
				break;
		}
	}
}
