<?php
/**
 * Begin HTML output.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Begin HTML, get the head class, and
 * load sitewide hooks.
 */
class HTML {

    /**
	 * Constructor magic method.
	 */
    public function __construct() {

        // Get dependencies.
        $this->dependencies();

        // Begin the HTML output.
        $this->html();

        // Get the <head> section.
        $this->head();

        // Output the <body> tag.
        $this->body();

        // Hook ready for a page loader.
        $this->loader();

        // Hook ready for a top bar.
        $this->topbar();

        // Get the site header.
        $this->header();

    }

    /**
     * Dependencies use get_theme_file_path for child themeing.
     */
    public function dependencies() {

        // Get the site header output.
        require_once get_theme_file_path( '/template-parts/header/class-header.php' );

    }

    /**
     * Begin HTML output.
     */
    public function html() {

        require_once get_theme_file_path( '/includes/head/partials/begin-html.php' );

    }

    /**
     * Get the head class for the <head> section.
     */
    public function head() {

        $head = new Head;

        return $head;

    }

    /**
     * Get the <body> tag output.
     * 
     * Body conditional Schema attributes
     * found at inludes/template-tags/class-body-schema
     */
    public function body() {

        require_once get_theme_file_path( '/includes/template-tags/partials/body-tag.php' );

    }

    /**
     * Empty hook ready for page loader HTML.
     */
    public function loader() {

        do_action( 'cct_loader' );

    }

    /**
     * Empty hook ready for top bar HTML.
     */
    public function topbar() {

        do_action( 'cct_topbar' );

    }

    /**
     * Hook that adds the site header with
     * branding and navigation hook.
     * 
     * The header is called with a hook for
     * removal by theme builders.
     */
    public function header() {

        do_action( 'cct_header' );

    }

}

// Run the HTML class.
new HTML;