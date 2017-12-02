<?php
/**
 * Opening HTML.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos
 * @since Controlled_Chaos 1.0.1
 */

namespace Controlled_Chaos;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit; ?>

<!DOCTYPE html>
<?php do_action( 'controlled_chaos_before_html' ); ?>
<html <?php language_attributes(); ?> class="no-js">
<head data-template-set="controlled-chaos">
<?php echo sprintf( '<meta charset="%1s">', get_bloginfo( 'charset' ) ); ?>
<!--[if IE ]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<?php
$meta_viewport = '<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>';
$viewport      = apply_filters( 'cct_meta_viewport', $meta_viewport );
echo $viewport; ?>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( is_singular() && pings_open() ) {
    echo sprintf( '<link rel="pingback" href="%s" />', get_bloginfo( 'pingback_url' ) );
} ?>
<link href="<?php echo get_the_permalink(); ?>" rel="canonical" />
<?php if ( is_search() ) { echo '<meta name="robots" content="noindex,nofollow" />'; }
