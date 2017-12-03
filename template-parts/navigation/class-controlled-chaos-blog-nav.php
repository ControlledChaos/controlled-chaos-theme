<?php
/**
 * Blog pages navigation.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Blog pages navigation.
 */
class Controlled_Chaos_Blog_Nav {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

		add_action( 'cct_after_main', [ $this, 'nav' ] );

	}
	
	/**
	 * Get navigation style.
	 */
	public function nav() {

		if ( ! is_singular() ) {
			get_template_part( 'template-parts/navigation/partials/posts-nav' );
		}

	}

}

$cct_blog_nav = new Controlled_Chaos_Blog_Nav;