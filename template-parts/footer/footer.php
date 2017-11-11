<?php
/**
 * Footer HTML template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Footer HTML template.
 */
class Controlled_Chaos_Footer {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        $this->partials();

        wp_footer();

    }

    public function partials() {

        // Footer opening tags and before footer actions.
        get_template_part( 'template-parts/footer/partials/open-footer' );

        // Site branding and before/after footer content actions.
        get_template_part( 'template-parts/footer/partials/content' );

        // Footer closing tags and after footer actions.
        get_template_part( 'template-parts/footer/partials/close-footer' );

    }

}