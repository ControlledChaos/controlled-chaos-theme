<?php
/**
 * Admin functiontionality and templates.
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

// Bail if not in the admin.
if ( ! is_admin() ) {
	return;
}

class Admin {

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
	private function __construct() {

		// Add admin header if the companion plugin is not active.
		if ( ! is_plugin_active( CCT_PLUGIN ) ) {

			// Register admin menus.
			add_action( 'after_setup_theme', [ $this, 'admin_menus' ] );

			// Admin header.
			add_action( 'in_admin_header', [ $this, 'admin_header' ] );

		}

	}

	/**
	 * Class dependency files.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function dependencies() {

		require_once get_theme_file_path( '/includes/admin/class-admin-settings.php' );

	}

	/**
	 * Register admin menus.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function admin_menus() {

		register_nav_menus( [
			'admin-header' => __( 'Admin Header Menu', 'controlled-chaos' )
		] );

	}

	/**
	 * Admin header.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function admin_header() {

		if ( is_admin() ) {
			get_template_part( 'includes/admin/partials/admin-header' );
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
function cct_admin() {

	return Admin::instance();

}

// Run an instance of the class.
cct_admin();