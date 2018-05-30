<?php
/**
 * Customizer controls.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

namespace CCTheme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Customizer base class.
 */
class Customizer_Controls {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        // Include Customizer dependencies.
		$this->dependencies();

    }

    /**
     * Include Customizer dependencies.
     */
    public function dependencies() {

        require_once get_parent_theme_file_path( '/includes/customizer/controls/class-customizer-blog.php' );

    }

}

new Customizer_Controls;