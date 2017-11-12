<?php
/**
 * Post comments form heading.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Post comments form heading.
 */
class Controlled_Chaos_Comments_Heading {

    /**
	 * Constructor magic method.
	 */
    public function __construct() {

        // Heading text.
        $this->heading();

    }

    /**
     * Heading text.
     * 
     * @since Controlled_Chaos 1.0.1
     */
    public static function heading() {

        $comments_number = get_comments_number();
        if ( 1 === $comments_number ) {
            $comments_heading = sprintf( _x( 'One comment on %1s', 'comments title', 'controlled-chaos' ), get_the_title() );
        } else {
            $comments_heading = sprintf(
                _nx(
                    '%1s Comment on %2s',
                    '%1s Comments on %2s',
                    $comments_number,
                    'comments title',
                    'controlled-chaos'
                ),
                number_format_i18n( $comments_number ),
                get_the_title()
            );
        }

        return $comments_heading;

    }

}

$controlled_chaos_comments_heading = new Controlled_Chaos_Comments_Heading;