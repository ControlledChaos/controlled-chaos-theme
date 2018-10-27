<?php
/**
 * Admin settings.
 *
 * @package    Controlled_Chaos_Theme
 * @subpackage Includes\Admin
 *
 * @since      1.0.0
 * @author     Greg Sweet <greg@ccdzine.com>
 */
namespace CC_Theme\Includes\Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

class Admin_Settings {

	/**
	 * Get an instance of the class.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object Returns the instance.
	 */
	public static function instance() {

		// Varialbe for the instance to be used outside the class.
		static $instance = null;

		if ( is_null( $instance ) ) {

			// Set variable for new instance.
			$instance = new self;

			// Require the class files.
			$instance->dependencies();

		}

		// Return the instance.
		return $instance;

	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return self
	 */
	private function __construct() {}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		/**
		 * Admin settings if the companion plugin is active.
		 *
		 * The plugin path is defined in `functions.php`
		 */
		if ( is_plugin_active( CCT_PLUGIN ) ) {
			require_once get_theme_file_path( '/includes/admin/class-plugin-settings.php' );

		// Admin settings if the companion plugin is not active.
		} else {
			require_once get_theme_file_path( '/includes/admin/class-theme-settings.php' );
		}

	}

}

/**
 * Put an instance of the class into a function.
 *
 * @since  1.0.0
 * @access public
 * @return object Returns an instance of the class.
 */
function cct_admin_settings() {

	return Admin_Settings::instance();

}

// Run an instance of the class.
cct_admin_settings();