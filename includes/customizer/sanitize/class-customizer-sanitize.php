<?php
/**
 * Customizer sanitize functions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

// Do not namespace this class.

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Customizer base class.
 */
class Customizer_Sanitize {

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

        require_once get_parent_theme_file_path( '/includes/customizer/sanitize/sanitize-blog.php' );

    }
    
}

new Customizer_Sanitize;