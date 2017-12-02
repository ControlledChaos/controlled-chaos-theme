<?php
/**
 * Content HTML template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Content HTML template.
 */
class Controlled_Chaos_Content {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        $this->partials();

    }

    /**
	 * Content partials.
     * 
     * @since Controlled_Chaos 1.0.0
	 */
    public static function partials() {

        if ( is_front_page() && is_home() ) {
            $content = get_template_part( 'template-parts/content/partials/content', 'home' );
        } elseif ( is_front_page() ) {
            $content = get_template_part( 'template-parts/content/partials/content', 'front-page' );
        } elseif ( is_home() ) {
            $content = get_template_part( 'template-parts/content/partials/content', 'home' );
        } elseif ( is_archive() ) {
            $content = get_template_part( 'template-parts/content/partials/content', 'archive' );
        } elseif ( is_search() ) {
            $content = get_template_part( 'template-parts/content/partials/content', 'search' );
        } else {
            $content = get_template_part( 'template-parts/content/partials/content', 'singular' );
        }

        return apply_filters( 'cct_content', $content );

    }

}