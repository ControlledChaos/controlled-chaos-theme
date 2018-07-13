<?php
/**
 * Author meta tag.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

class Controlled_Chaos_Theme_Meta_Author {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		add_action( 'controlled_chaos_meta_author', [ $this, 'author' ] );

	}

	/**
	 * Author meta tag.
	 * 
	 * @since  1.0.0
	 */
	public function author() {

		global $post;

		echo get_the_author_meta( 'display_name' );
			
	}

}

// Run the Controlled_Chaos_Theme_Meta_Author class.
$controlled_chaos_meta_author = new Controlled_Chaos_Theme_Meta_Author;