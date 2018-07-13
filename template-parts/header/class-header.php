<?php
/**
 * Header HTML template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Header HTML template.
 */
class Header {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        add_action( 'cct_header', [ $this, 'partials' ] );

    }

    /**
	 * Header partials.
     * 
     * @since  1.0.0
	 */
    public function partials() {

        // Header opening tags and before header action.
        get_template_part( 'template-parts/header/partials/open-header' );

        // Site branding and before/after header content actions.
        get_template_part( 'template-parts/header/partials/site-branding' );

        // Main navigation menu.
        get_template_part( 'template-parts/navigation/partials/navigation', 'main' );

        // Header closing tags and after header action.
        get_template_part( 'template-parts/header/partials/close-header' );

    }

}

// Run the Header class.
new Header;