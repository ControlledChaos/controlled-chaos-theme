<?php
/**
 * Customizer base class.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

// namespace CCTheme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Customizer base class.
 */
class Customizer {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        // Include Customizer dependencies.
		$this->dependencies();

		// Customizer panels & sections.
		add_action( 'customize_register', [ $this, 'customizer' ] );

    }

    /**
     * Include Customizer dependencies.
     */
    public function dependencies() {

        require_once get_parent_theme_file_path( '/includes/customizer/controls/class-customizer-controls.php' );
		require_once get_parent_theme_file_path( '/includes/customizer/sanitize/class-customizer-sanitize.php' );

    }

    /**
	 * Customizer panels & sections.
	 */
	public function customizer( $wp_customize ) {

		// Remove the theme switcher panel.
		$wp_customize->remove_panel( 'themes' );
		$wp_customize->remove_control( 'active_theme' );

        // Set site name and description to be previewed in real-time.
		$wp_customize->get_setting( 'blogname' )->transport='postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport='postMessage';

    }

}

new Customizer;