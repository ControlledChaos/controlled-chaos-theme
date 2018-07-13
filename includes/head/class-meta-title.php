<?php
/**
 * Title meta tag.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

class Controlled_Chaos_Theme_Meta_Title {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		add_action( 'controlled_chaos_meta_title', [ $this, 'title' ] );

	}

	/**
	 * Title meta tag.
	 * 
	 * @since  1.0.0
	 */
	public function title() {

		if ( is_front_page() ) {
			$title = bloginfo( 'name' );
		} else {
			$title = the_title();
		}

		echo $title;

	}

}

// Run the Controlled_Chaos_Theme_Meta_Title class.
$controlled_chaos_meta_title = new Controlled_Chaos_Theme_Meta_Title;