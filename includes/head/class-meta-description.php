<?php
/**
 * Description meta tag.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

namespace CCTheme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

class Controlled_Chaos_Meta_Description {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		add_action( 'controlled_chaos_meta_description', [ $this, 'description' ] );

	}

	/**
	 * Description meta tag.
	 * 
	 * @since  1.0.0
	 */
	public function description() {

		if ( is_front_page() ) {
			bloginfo( 'description' );
		} elseif ( is_404() ) {
			echo __( 'No results found.' );
		} else { 
			echo wp_trim_words( get_the_content(), 40, '...' );
		}
			
	}

}

// Run the Controlled_Chaos_Meta_Description class.
$controlled_chaos_meta_description = new Controlled_Chaos_Meta_Description;