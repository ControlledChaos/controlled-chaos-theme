<?php
/**
 * Begin the <head> section.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.0
 */

namespace Controlled_Chaos;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) exit;

$meta_viewport = '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>';
$viewport      = apply_filters( 'cct_meta_viewport', $meta_viewport );

if ( is_home() && ! is_front_page() ) {
    $link = get_permalink( get_option( 'page_for_posts' ) );
} elseif ( is_archive() ) {
    $link = get_permalink( get_option( 'page_for_posts' ) );
} else {
    $link = get_permalink();
}

$canonical = apply_filters( 'cct_canonical_link', $link ); ?>

<head id="<?php echo get_bloginfo( 'wpurl' ); ?>" data-template-set="<?php echo get_template(); ?>">
<?php echo sprintf( '<meta charset="%1s">', get_bloginfo( 'charset' ) ); ?>

<!--[if IE ]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<?php echo $viewport; ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open() ) {
    echo sprintf( '<link rel="pingback" href="%s" />', get_bloginfo( 'pingback_url' ) );
} ?>
<link href="<?php echo $canonical; ?>" rel="canonical" />
<?php if ( is_search() ) { echo '<meta name="robots" content="noindex,nofollow" />'; }