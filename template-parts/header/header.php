<?php
/**
 * Header HTML template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Header HTML template.
 */
class Controlled_Chaos_Header {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        add_action( 'generate_header', [ $this, 'partials' ] );

    }

    /**
	 * Header partials.
     * 
     * @since Controlled_Chaos 1.0.0
	 */
    public function partials() {

        // Header opening tags and before header actions.
        get_template_part( 'template-parts/header/partials/open-header' );

        // Site branding and before/after header content actions.
        get_template_part( 'template-parts/header/partials/site-branding' );

        // Header closing tags and after header actions.
        get_template_part( 'template-parts/header/partials/close-header' );

    }

}

$cct_header = new Controlled_Chaos_Header;