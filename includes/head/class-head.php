<?php
/**
 * Controlled_Chaos_Theme head template.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Controlled_Chaos_Theme head template.
 */
class Head {

	/**
	 * Constructor magic method.
	 */
	public function __construct() {

		// Opening tags.
		$this->head_begin();

		// Dependencies, especially for meta tags.
		$this->dependencies();

		// Core wp_head() function.
		wp_head();

		// Meta tags for SEO and embedded links.
		$this->meta_tags();

		// Conditionally get bookmarks.
		$this->bookmarks();

		// Close the head section.
		$this->head_end();

	}
	
	/**
	 * Opening tags.
	 * 
	 * @since  1.0.0
	 */
	public function head_begin() {

		require get_theme_file_path( '/includes/head/partials/head-begin.php' );

	}

	/**
	 * Dependencies use get_template_part for child themeing.
	 * 
	 * @since  1.0.0
	 */
	public function dependencies() {

		get_template_part( 'includes/head/class-meta', 'url' );
		get_template_part( 'includes/head/class-meta', 'name' );
		get_template_part( 'includes/head/class-meta', 'type' );
		get_template_part( 'includes/head/class-meta', 'title' );
		get_template_part( 'includes/head/class-meta', 'description' );
		get_template_part( 'includes/head/class-meta', 'image' );
		get_template_part( 'includes/head/class-meta', 'author' );

	}

	/**
	 * Meta tags for SEO and embedded links.
	 */
	public function meta_tags() {

		get_template_part( 'includes/head/partials/meta-tags', 'standard' );
		get_template_part( 'includes/head/partials/meta-tags', 'open-graph' );
		get_template_part( 'includes/head/partials/meta-tags', 'twitter' );

	}

	/**
	 * Conditionally get bookmarks.
	 * 
	 * @since  1.0.0
	 */
	public function bookmarks() {

		if ( ! has_site_icon() ) {
			get_template_part( 'includes/head/partials/meta', 'bookmarks' );
		} else {
			wp_site_icon();
		}

	}

	/**
	 * Close the head section.
	 * 
	 * @since  1.0.0
	 */
	public function head_end() {

		require get_theme_file_path( '/includes/head/partials/head-end.php' );

	}
	    
}