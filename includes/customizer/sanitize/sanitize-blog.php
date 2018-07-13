<?php
/**
 * Customizer blog controls.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Blog content format.
 */
function cct_sanitize_blog_content_format( $input ) {

    $valid = [ 'content', 'excerpt' ];

    if ( in_array( $input, $valid ) ) {
        return $input;
    }
    return 'content';

}

/**
 * Archive content format.
 */
function cct_sanitize_archive_content_format( $input ) {

    $valid = [ 'content', 'excerpt' ];

    if ( in_array( $input, $valid ) ) {
        return $input;
    }
    return 'content';

}

/**
 * Blog/archive navigation format.
 */
function cct_sanitize_blog_navigation_format( $input ) {

    $valid = [ 'standard', 'numeric' ];

    if ( in_array( $input, $valid ) ) {
        return $input;
    }
    return 'standard';

}