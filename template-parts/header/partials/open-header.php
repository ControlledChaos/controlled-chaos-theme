<?php
/**
 * Header opening tags and before header actions.
 *
 * @package WordPress
 * @subpackage Controlled_Chaos_Theme
 * @since  1.0.0
 */

namespace CC_Theme;

// Restrict direct access
if ( ! defined( 'ABSPATH' ) ) exit;

do_action( 'cct_before_header' ); ?>
<header class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/Organization">