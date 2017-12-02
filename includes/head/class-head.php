<?php
/**
 * Controlled_Chaos head template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Controlled_Chaos head template.
 */
class Controlled_Chaos_Head {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		// Opening tags.
		$this->open_html();

		// Dependencies, especially for meta tags.
		$this->dependencies();

		// Core wp_head() function.
		wp_head();

		// Meta tags for SEO and embedded links.
		$this->meta_tags();

		// Conditionally get bookmarks.
		$this->bookmarks();

		// Close the head section.
		$this->close_head();

	}
	
	/**
	 * Opening tags.
	 * 
	 * @since Controlled_Chaos 1.0.0
	 */
	public function open_html() {

		get_template_part( 'includes/head/partials/class-open-html' );

	}

	/**
	 * Dependencies, especially for meta tags.
	 * 
	 * @since Controlled_Chaos 1.0.0
	 */
	public function dependencies() {

		// Check for the Controlled Chaos companion plugin.
		if ( ! is_plugin_active( 'controlled-chaos-plugin/controlled-chaos-plugin.php' ) ) {
			get_template_part( 'includes/head/partials/class-meta', 'url' );
			get_template_part( 'includes/head/partials/class-meta', 'name' );
			get_template_part( 'includes/head/partials/class-meta', 'type' );
			get_template_part( 'includes/head/partials/class-meta', 'title' );
			get_template_part( 'includes/head/partials/class-meta', 'description' );
			get_template_part( 'includes/head/partials/class-meta', 'image' );
			get_template_part( 'includes/head/partials/class-meta', 'author' );
			get_template_part( 'includes/head/partials/class-meta', 'bookmarks' );
		}

	}

	/**
	 * Meta tags for SEO and embedded links.
	 */
	public function meta_tags() {

		// Check for the Controlled Chaos companion plugin.
		if ( ! is_plugin_active( 'controlled-chaos-plugin/controlled-chaos-plugin.php' ) ) {
			get_template_part( 'includes/head/partials/class-meta-tags', 'standard' );
			get_template_part( 'includes/head/partials/class-meta-tags', 'open-graph' );
			get_template_part( 'includes/head/partials/class-meta-tags', 'twitter' );
		}

	}

	/**
	 * Conditionally get bookmarks.
	 * 
	 * @since Controlled_Chaos 1.0.0
	 */
	public function bookmarks() {

		if ( ! has_site_icon() ) {
			do_action( 'controlled_chaos_bookmarks' );
		} else {
			wp_site_icon();
		}

	}

	/**
	 * Close the head section.
	 * 
	 * @since Controlled_Chaos 1.0.0
	 */
	public function close_head() {

		echo '</head>' . "\r";

	}
	    
}