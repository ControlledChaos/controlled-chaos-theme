<?php
/**
 * Template tag functions
 * 
 * Convert static class methods to more traditional tags.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since Controlled Chaos 1.0.0
 */
namespace CC_Theme;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Page template function
 * 
 * This is used to conditionally get ass standard templates.
 * 
 * @since 1.0.0
 * @return void
 */
if ( ! function_exists( 'cct_template' ) ) :

	function cct_template() {

		$cct_template = require get_theme_file_path( '/template-parts/content/content.php' );

		return $cct_template;

	}

endif;