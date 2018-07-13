<?php
/**
 * Content HTML template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Content HTML template.
 */
class Content {

    /**
	 * Constructor magic method.
	 */
	public function __construct() {

        $this->partials();

    }

    /**
	 * Content partials.
     * 
     * @since  1.0.0
	 */
    public function partials() {

        if ( is_front_page() && is_home() ) {
            $partial = get_template_part( 'template-parts/content/partials/content', 'home' );
        } elseif ( is_front_page() ) {
            $partial = get_template_part( 'template-parts/content/partials/content', 'front-page' );
        } elseif ( is_home() ) {
            $partial = get_template_part( 'template-parts/content/partials/content', 'home' );
        } elseif ( is_archive() ) {
            $partial = get_template_part( 'template-parts/content/partials/content', 'archive' );
        } elseif ( is_search() ) {
            $partial = get_template_part( 'template-parts/content/partials/content', 'search' );
        } else {
            $partial = get_template_part( 'template-parts/content/partials/content', 'singular' );
        }

        $content = apply_filters( 'cct_content_part', $partial );
        
        echo $content;

    }

}

new Content;