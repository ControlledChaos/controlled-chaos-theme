<?php
/**
 * Blog pages numeric navigation.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

if ( is_singular() ) {
    return;
}

global $wp_query;

// Stop execution if there's only 1 page.
if ( $wp_query->max_num_pages <= 1 ) {
    return;
}

$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
$max   = intval( $wp_query->max_num_pages );

//	Add current page to the array.
if ( $paged >= 1 )
    $links[] = $paged;

//	Add the pages around the current page to the array.
if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
}

if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
}

// Previous posts page link.
if ( get_previous_posts_link() ) {
    $prev_link = sprintf( '<li><span class="prev-page" rel="prev">%s</span></li>', get_previous_posts_link( '<span>Previous Page</span>' ) );
} else {
    $prev_link = '';
}

//	Next posts page link.
if ( get_next_posts_link() ) {
    $next_link = sprintf( '<li><span class="next-page" rel="next">%s</span></li>', get_next_posts_link( '<span>Next Page</span>' ) );
} else {
    $next_link = '';
}

//	Link to first page, plus ellipses if necessary.
if ( ! in_array( 1, $links ) ) {
    $class       = 1 == $paged ? ' class="active"' : '';
    $first_link  = sprintf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( 1 ) ), esc_html( '1', 'controlled-chaos' ) );

    if ( ! in_array( 2, $links ) ) {
        $first_more = '<li>&hellip;</li>';
    } else {
        $first_more = null;
    }

    $first = $first_link . $first_more;
} else {
    $first = null;
}

//	Link to last page, plus ellipses if necessary.
if ( ! in_array( $max, $links ) ) {
    $class     = $paged == $max ? ' class="active"' : '';
    $last_link = sprintf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( $max ) ), $max );

    if ( ! in_array( $max - 1, $links ) ) {
        $max_more = '<li>&hellip;</li>';
    } else {
        $max_more = null;
    }

    $last = $max_more . $last_link;
} else {
    $last = null;
}
$label = apply_filters( 'cct_numeric_pagination_label', __( 'Page: ', 'controlled-chaos' ) ); ?>
<nav class="numeric-pagination">
    <label class="numeric-pagination-label" for="numeric-pagination-list"><?php echo $label; ?></label>
    <ul id="numeric-pagination-list">
        <?php echo $prev_link . $first;
        sort( $links );
        foreach ( (array) $links as $link ) {
            $class = $paged == $link ? ' class="active"' : '';
            echo sprintf( '<li%s><a href="%s">%s</a></li>', $class, esc_url( get_pagenum_link( $link ) ), $link );
        } echo $last . $next_link; ?>
    </ul>
</nav>