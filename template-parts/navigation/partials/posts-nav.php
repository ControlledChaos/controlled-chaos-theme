<?php
/**
 * Blog pages standard navigation.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

if ( is_search() ) {
    $prev = __( 'Previous Results', 'controlled-chaos' );
    $next = __( 'More Results', 'controlled-chaos' );
} else {
    $prev = __( 'Previous Page', 'controlled-chaos' );
    $next = __( 'Next Page', 'controlled-chaos' );
}

$prev_posts = apply_filters( 'cct_prev_posts_label', sprintf( '<span>%1s</span>', $prev ) );
$next_posts = apply_filters( 'cct_next_posts_label', sprintf( '<span>%1s</span>', $next ) );
?>
<nav class="posts-nav">
	<span class="prev-page" rel="prev"><?php previous_posts_link( $prev_posts ); ?></span>
	<span class="next-page" rel="next"><?php next_posts_link( $next_posts ); ?></span>
</nav>