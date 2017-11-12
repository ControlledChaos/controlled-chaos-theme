<?php
/**
 * Post comments form status.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Post comments form status.
 */
class Controlled_Chaos_Comments_Status {

    /**
	 * Constructor magic method.
	 */
    public function __construct() {

        // No comments.
        $this->none();

        // Comments closed.
        $this->closed();

    }

    /**
     * No comments.
     * 
     * @since Controlled_Chaos 1.0.1
     */
    public static function none() {

        $comments_none = apply_filters( 'cct_comments_none', sprintf( '<p class="comments-none-closed"><span class="comments-none">%1s</span></p>', __( 'Be the first to comment!', 'controlled-chaos' ) ) );

        return $comments_none;

    }

    /**
     * Comments closed.
     * 
     * @since Controlled_Chaos 1.0.1
     */
    public static function closed() {

        $comments_closed = apply_filters( 'cct_comments_closed', sprintf( '<p class="comments-none-closed"><span class="comments-closed">%1s</span>.</p>', __( 'Comments are closed for this post', 'controlled-chaos' ) ) );

        return $comments_closed;

    }

}

$controlled_chaos_comments_status = new Controlled_Chaos_Comments_Status;