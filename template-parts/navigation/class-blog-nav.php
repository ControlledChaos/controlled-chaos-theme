<?php
/**
 * Blog pages navigation.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since  1.0.0
 */

namespace CCTheme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Blog pages navigation.
 */
class Blog_Nav {

    /**
	 * Initialize the class.
	 */
	public function __construct() {
		
		add_action( 'cctheme_before_footer', [ $this, 'nav' ], 20 );

	}
	
	/**
	 * Get navigation style.
	 */
	public function nav() {

		if ( 'numeric' == cctheme_sanitize_blog_navigation_format( get_theme_mod( 'cctheme_blog_navigation_format' ) ) ) {
			get_template_part( 'template-parts/navigation/partials/numeric-nav' );
		} else {
			get_template_part( 'template-parts/navigation/partials/posts-nav' );
		}

	}

}

new Blog_Nav;