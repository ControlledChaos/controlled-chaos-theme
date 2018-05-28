<?php
/**
 * Content index class.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled Chaos 1.0.0
 */
namespace CCTheme\Index;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

class Index {

	/**
	 * Initialize the class.
	 */
	public function __construct() {

		// Begin HTML and get <head> section.
		get_header();

		// Extensibility hook.
		do_action( 'cctheme_before_post' );

		/**
		 * Run class for sidebars and widget areas.
		 * 
		 * Needs to run before the loop.
		 */
		get_sidebar();

		// Content templates.
		$this->content();

		// Extensibility hook.
		do_action( 'cctheme_after_post' );

		// Load scripts and close HTML.
		get_footer();

	}

	public function content() {

		require get_theme_file_path( '/template-parts/content/content.php' );

	}

}

// Run the Index class.
new Index;