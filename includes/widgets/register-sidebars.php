<?php
/**
 * Register sidebar widget areas.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// No direct access, please
if ( ! defined( 'ABSPATH' ) ) exit;

class Register_Sidebars {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        // Add the primary sidebar.
        add_action( 'widgets_init', [ $this, 'primary' ] );

        // Add the secondary sidebar.
        add_action( 'widgets_init', [ $this, 'secondary' ] );

    }

    /**
	 * Register primary sidebar.
	 *
	 * @since  1.0.0
	 */
	public function primary() {

		include_once get_theme_file_path( '/includes/widgets/partials/primary-sidebar.php' );

    }
    
    /**
	 * Register widget areas.
	 *
	 * @since  1.0.0
	 */
	public function secondary() {

		include_once get_theme_file_path( '/includes/widgets/partials/secondary-sidebar.php' );

	}

}

new Register_Sidebars;